### CSP - Content security policy (chính sách bảo mật nội dung) là gì?

- CSP là một cơ chế bảo mật trình duyệt nhằm giảm thiểu XSS và một số cuộc tấn công khác. Nó hoạt động bằng cách hạn chế các tài nguyên (chẳng hạn như tập lệnh và hình ảnh) mà một trang có thể tải và hạn chế liệu một trang có thể được đóng khung bởi các trang khác hay không.

- Để bật CSP, phản hồi cần bao gồm tiêu đề phản hồi HTTP được gọi Content-Security-Policyvới giá trị chứa chính sách. Bản thân chính sách bao gồm một hoặc nhiều chỉ thị, được phân tách bằng dấu chấm phẩy.

## Giảm thiểu các cuộc tấn công XSS bằng CSP
- Lệnh sau sẽ chỉ cho phép các tập lệnh được tải từ cùng một nguồn với chính trang đó:

                                        script-src 'self'
- Lệnh sau sẽ chỉ cho phép tải tập lệnh từ một miền cụ thể:
                                        script-src https://scripts.normal-website.com


- Cần cẩn thận khi cho phép các tập lệnh từ các miền bên ngoài. Nếu có bất kỳ cách nào để kẻ tấn công kiểm soát nội dung được cung cấp từ miền bên ngoài thì chúng có thể thực hiện một cuộc tấn công. Ví dụ: mạng phân phối nội dung (CDN) không sử dụng URL của mỗi khách hàng, chẳng hạn như ajax.googleapis.com, sẽ không đáng tin cậy vì bên thứ ba có thể tải nội dung lên miền của họ.

- Ngoài việc đưa các miền cụ thể vào danh sách trắng, chính sách bảo mật nội dung còn cung cấp hai cách khác để chỉ định tài nguyên đáng tin cậy: nonces và hashes:

- Lệnh CSP có thể chỉ định một nonce (một giá trị ngẫu nhiên) và giá trị tương tự phải được sử dụng trong thẻ tải tập lệnh. Nếu các giá trị không khớp thì tập lệnh sẽ không được thực thi. Để có hiệu quả như một biện pháp kiểm soát, nonce phải được tạo một cách an toàn trên mỗi lần tải trang và kẻ tấn công không thể đoán được.
- Lệnh CSP có thể chỉ định hàm băm của nội dung của tập lệnh đáng tin cậy. Nếu hàm băm của tập lệnh thực tế không khớp với giá trị được chỉ định trong lệnh thì tập lệnh sẽ không thực thi. Nếu nội dung của tập lệnh thay đổi thì tất nhiên bạn sẽ cần cập nhật giá trị băm được chỉ định trong lệnh.
- Việc CSP chặn các tài nguyên như script. Tuy nhiên, nhiều CSP cho phép yêu cầu hình ảnh. Điều này có nghĩa là bạn có thể thường xuyên sử dụng imgcác phần tử để đưa ra yêu cầu tới các máy chủ bên ngoài nhằm tiết lộ mã thông báo CSRF chẳng hạn.

- Một số trình duyệt, chẳng hạn như Chrome, có tính năng giảm thiểu đánh dấu lơ lửng tích hợp sẽ chặn các yêu cầu chứa một số ký tự nhất định, chẳng hạn như dòng mới thô, chưa được mã hóa hoặc dấu ngoặc nhọn.

## Giảm thiểu các cuộc tấn công đánh dấu lơ lửng bằng CSP

- Bỏ qua CSP bằng cách chèn chính sách
- Bạn có thể gặp một trang web phản ánh thông tin đầu vào về chính sách thực tế, rất có thể là dưới dạng report-urichỉ thị. Nếu trang web phản ánh một tham số mà bạn có thể kiểm soát, bạn có thể thêm dấu chấm phẩy để thêm chỉ thị CSP của riêng mình. Thông thường, report-urilệnh này là lệnh cuối cùng trong danh sách. Điều này có nghĩa là bạn sẽ cần ghi đè các chỉ thị hiện có để khai thác lỗ hổng này và bỏ qua chính sách.

- Thông thường, không thể ghi đè lên một script-srclệnh hiện có. Tuy nhiên, Chrome gần đây đã giới thiệu script-src-elemlệnh này, cho phép bạn kiểm soát scriptcác phần tử chứ không phải sự kiện. Điều quan trọng là lệnh mới này cho phép bạn ghi đè các lệnh hiện có script-src .

## Bảo vệ chống clickjacking bằng CSP
- Lệnh sau sẽ chỉ cho phép trang được đóng khung bởi các trang khác có cùng nguồn gốc:

                                        frame-ancestors 'self'
- Chỉ thị sau đây sẽ ngăn chặn hoàn toàn việc đóng khung:

                                        frame-ancestors 'none'
- Sử dụng chính sách bảo mật nội dung để ngăn chặn clickjacking linh hoạt hơn so với sử dụng tiêu đề X-Frame-Options vì bạn có thể chỉ định nhiều tên miền và sử dụng ký tự đại diện. Ví dụ:

                                        frame-ancestors 'self' https://normal-website.com https://*.robust-website.com
- CSP cũng xác thực từng khung trong hệ thống phân cấp khung gốc, trong khi X-Frame-Optionschỉ xác thực khung cấp cao nhất.

- Nên sử dụng CSP để bảo vệ khỏi các cuộc tấn công clickjacking. Bạn cũng có thể kết hợp điều này với X-Frame-Optionstiêu đề để cung cấp khả năng bảo vệ trên các trình duyệt cũ hơn không hỗ trợ CSP, chẳng hạn như Internet Explorer.
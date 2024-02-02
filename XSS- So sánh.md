### So sánh

- Reflected XSS và Stored XSS có 2 sự khác biệt lớn trong quá trình tấn công.

+ Thứ nhất, để khai thác Reflected XSS, hacker phải lừa được nạn nhân truy cập vào URL của mình. Còn Stored XSS không cần phải thực hiện việc này, sau khi chèn được mã nguy hiểm vào CSDL của ứng dụng, hacker chỉ việc ngồi chờ nạn nhân tự động truy cập vào. Với nạn nhân, việc này là hoàn toàn bình thường vì họ không hề hay biết dữ liệu mình truy cập đã bị nhiễm độc.

+ Thứ 2, mục tiêu của hacker sẽ dễ dàng đạt được hơn nếu tại thời điểm tấn công nạn nhân vẫn trong phiên làm việc(session) của ứng dụng web. Với Reflected XSS, hacker có thể thuyết phục hay lừa nạn nhân đăng nhập rồi truy cập đến URL mà hắn ta cung cấp để thực thi mã độc. Nhưng Stored XSS thì khác, vì mã độc đã được lưu trong CSDL Web nên bất cứ khi nào người dùng truy cập các chức năng liên quan thì mã độc sẽ được thực thi, và nhiều khả năng là những chức năng này yêu cầu phải xác thực(đăng nhập) trước nên hiển nhiên trong thời gian này người dùng vẫn đang trong phiên làm việc.

Từ những điều này có thể thấy Stored XSS nguy hiểm hơn Reflected XSS rất nhiều, đối tượng bị ảnh hưởng có thế là tất cả nhưng người sử dụng ứng dụng web đó. Và nếu nạn nhân có vai trò quản trị thì còn có nguy cơ bị chiếm quyền điều khiển web.


- Reflected XSS và DOM Based XSS có 1 điểm khác biệt lớn trong cơ chế ngăn chặn tấn công.
+ Bạn đọc đã thấy được sự khác nhau của DOM based XSS và Reflected XSS chứ. Thế nhưng bạn sẽ thắc mắc rằng sự khác biệt này thì có ý nghĩa gì. Thật ra là có đấy. Trình duyệt web Google Chrome có một tính năng bảo mật được bật mặc định là XSS Auditor, nó là 1 filter của browser, có chức năng ngăn chặn cuộc tấn công XSS. Browser sẽ kiểm tra xem trong request mà client gửi lên có chứa mã độc không, nó sẽ so sánh script này với nội dung response từ server. Nếu script từ request giống với response, XSS Auditor sẽ nhận biết đây là một cuộc tấn công XSS và block đoạn script này.

+ Như vậy XSS Auditor chỉ ngăn chặn được Reflected XSS mà không ngăn chặn được DOM based XSS, vì script của hacker không được copy vào response từ server.
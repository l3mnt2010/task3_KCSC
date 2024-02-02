### 1. Trình thông dịch PHP hoạt động như thế nào

- Trình thông dịch PHP chịu trách nhiệm thực thi mã PHP. Nó lấy mã nguồn PHP của bạn làm đầu vào, xử lý nó và tạo ra đầu ra, thường là HTML hoặc nội dung khác có thể được gửi đến trình duyệt web hoặc ứng dụng khách. Quá trình hoạt động của trình thông dịch PHP có thể được chia thành nhiều bước:

1. Phân tích từ vựng (Tokenization):
Trình thông dịch PHP đọc mã nguồn và chia nó thành các đơn vị nhỏ hơn gọi là mã thông báo. Mã thông báo là các khối xây dựng cơ bản của ngôn ngữ PHP, chẳng hạn như từ khóa, biến, toán tử và chữ.
2. Phân tích cú pháp:

Mã được mã hóa sau đó được phân tích cú pháp để xây dựng cây cú pháp, còn được gọi là cây cú pháp trừu tượng (AST). Cây cú pháp biểu thị cấu trúc phân cấp của mã và thực thi các quy tắc của ngữ pháp ngôn ngữ PHP.
3. Phân tích ngữ nghĩa:

Trình thông dịch thực hiện phân tích ngữ nghĩa trên cây cú pháp để đảm bảo rằng mã tuân thủ các quy tắc của ngôn ngữ PHP cũng như các biến và hàm được xác định và sử dụng chính xác.
4. Biên soạn:

Trình thông dịch tạo mã trung gian (còn được gọi là mã byte) từ cây cú pháp. Mã trung gian này là biểu diễn cấp thấp hơn của mã PHP và hiệu quả hơn khi thực thi.
5. Thi hành:

Mã byte được thực thi bởi công cụ PHP. Công cụ diễn giải mã byte và thực hiện các hoạt động được yêu cầu, chẳng hạn như phép gán biến, lệnh gọi hàm và câu lệnh luồng điều khiển.
6. Gõ động:

PHP là ngôn ngữ được gõ động, nghĩa là các loại biến được xác định khi chạy. Trình thông dịch xử lý các chuyển đổi loại và hoạt động tương ứng.
7. Chức năng và độ phân giải lớp:

Trong quá trình thực thi, trình thông dịch giải quyết các lệnh gọi hàm và phương thức, cũng như các định nghĩa và kế thừa lớp. Nó tải các lớp và thực thi các phương thức khi chúng được gọi.
8. Quản lý bộ nhớ:

Trình thông dịch PHP quản lý việc cấp phát và giải phóng bộ nhớ cho các biến và đối tượng. Nó cũng xử lý việc thu gom rác để lấy lại bộ nhớ từ các đối tượng không còn được sử dụng.
9. Tạo đầu ra:

Khi mã được thực thi, trình thông dịch có thể tạo đầu ra, chẳng hạn như HTML hoặc nội dung khác, dựa trên mã PHP và bất kỳ dữ liệu nào được lấy từ cơ sở dữ liệu hoặc các nguồn khác.
10. Phản hồi cho Khách hàng:

=> Sau khi quá trình thực thi hoàn tất và bất kỳ đầu ra nào đã được tạo, trình thông dịch sẽ gửi nội dung kết quả trở lại máy chủ web, sau đó gửi nó đến máy khách (trình duyệt).
Điều quan trọng cần lưu ý là PHP có thể được thực thi trong các môi trường khác nhau, chẳng hạn như trong ngữ cảnh máy chủ web (ví dụ: Apache với mô-đun PHP hoặc PHP-FPM) hoặc thông qua giao diện dòng lệnh (CLI). Ngoài ra, PHP hỗ trợ nhiều tiện ích mở rộng và thư viện khác nhau cung cấp chức năng bổ sung, như kết nối cơ sở dữ liệu, thao tác tệp, v.v.



- Hãy cùng tìm hiểu cách hoạt động của trình thông dịch PHP khi bạn thực thi một câu “Xin chào, Thế giới!” đơn giản. Tập lệnh PHP trong thiết bị đầu cuối sử dụng giao diện dòng lệnh (CLI).

1. Dòng lệnh:

Mở terminal hoặc dấu nhắc lệnh của bạn.
2. Chạy tập lệnh:

Điều hướng đến thư mục chứa tập lệnh PHP của bạn (hãy gọi nó là hello.php).
3. Trình thông dịch PHP:

Chạy lệnh sau trong terminal:
php hello. php
4. Xử lý trình thông dịch PHP:

Trình thông dịch PHP đọc nội dung hello.phptừng dòng một.
Nó nhận ra <?phpthẻ mở là phần bắt đầu của khối mã PHP.
5. Thi hành:

Trình thông dịch thực thi echocâu lệnh trong khối mã PHP.
Câu echolệnh xuất ra chuỗi "Xin chào, Thế giới!".
6. Tạo đầu ra:

Trình thông dịch PHP tạo ra kết quả “Xin chào, Thế giới!”.
7. Đầu ra thiết bị đầu cuối:

Đầu ra do trình thông dịch PHP tạo ra được hiển thị trực tiếp trong thiết bị đầu cuối.
Đây là các bước trông như thế nào trong thiết bị đầu cuối:

$ php hello.php 
Xin chào Thế giới!


Trong trường hợp này, trình thông dịch PHP thực thi tập lệnh PHP trực tiếp trong môi trường đầu cuối. Nó xử lý mã, tạo đầu ra và hiển thị đầu ra ngay lập tức trong cửa sổ terminal. Cách tiếp cận này hữu ích để chạy các tập lệnh PHP mà không cần tương tác với máy chủ web hoặc trình duyệt.













### 2. Luồng xử lý
## Web server xử lý file PHP thông qua PHP Interpreter, một phần của bộ công cụ PHP. Khi một yêu cầu HTTP được gửi đến một trang web chứa mã PHP, quá trình xử lý diễn ra như sau:

- Yêu cầu từ Client: Khi một trình duyệt web gửi yêu cầu đến server để lấy một trang PHP, yêu cầu này chứa mã nguồn PHP bên trong các thẻ <?php ?>.

- Web Server Nhận Yêu Cầu: Web server nhận yêu cầu và xác định rằng nó là một tệp PHP.

- Kích Thích PHP Interpreter: Web server gọi PHP Interpreter (thường là mô-đun hoặc quá trình riêng lẻ) để xử lý mã PHP. Interpreter sẽ đọc và thực thi từng dòng mã PHP một cách tuần tự.

- Thực Thi Mã PHP: Mã PHP sẽ thực thi, và nếu có mã HTML, nó sẽ được xuất ra như là phần của phản hồi HTTP.

- Phản Hồi Cho Client: Kết quả sau khi xử lý PHP và mã HTML được gửi về trình duyệt của người dùng dưới dạng phản hồi HTTP


Cách hiểu đơn giản hơn :


- Nhận Yêu Cầu HTTP: Khi một trình duyệt hoặc ứng dụng gửi một yêu cầu HTTP đến web server, yêu cầu này có thể chứa mã nguồn PHP. Các yêu cầu này thường có một phần mở rộng file là .php để web server biết rằng nó cần được xử lý bởi PHP Interpreter.
Xác Định Có Phải Là File PHP:

- Web server kiểm tra cấu hình để xác định xem tệp tin được yêu cầu có phải là một tệp tin PHP hay không. Điều này thường dựa trên cấu hình của web server (ví dụ: Apache, Nginx) và các mô-đun kết nối với PHP (ví dụ: mod_php cho Apache).
Chuyển Yêu Cầu đến PHP Interpreter:

- Nếu web server xác định rằng tệp tin là PHP, nó sẽ chuyển yêu cầu đến PHP Interpreter để thực thi mã nguồn PHP. Quá trình này có thể diễn ra thông qua mô-đun tích hợp (mod_php) hoặc thông qua cổng giao tiếp CGI (Common Gateway Interface).
Thực Thi Mã PHP:

- PHP Interpreter đọc và thực thi mã nguồn PHP từ tệp tin. Trong quá trình này, PHP có thể thực hiện các công việc như truy vấn cơ sở dữ liệu, xử lý biểu mẫu, hay thực hiện các chức năng khác được yêu cầu.
Tạo Kết Quả HTML:

- Kết quả của mã PHP thường là mã HTML được tạo ra dựa trên các lệnh và hàm PHP. Điều này có thể bao gồm HTML, CSS, JavaScript và bất kỳ mã nguồn nào được sinh ra từ mã PHP.
Gửi Kết Quả đến Web Server:

- Kết quả HTML được trả về từ PHP Interpreter cho web server để được gửi đến trình duyệt hoặc ứng dụng gửi yêu cầu.
Trả Kết Quả đến Trình Duyệt:

Web server gửi kết quả của mã PHP về trình duyệt hoặc ứng dụng, và nó được hiển thị cho người dùng cuối.


https://medium.com/@miladev95/how-does-php-interpreter-works-6dc2133f65f7
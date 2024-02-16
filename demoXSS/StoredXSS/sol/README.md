## Trang web có chức năng đăng kí đăng nhập, xem hàng và bình luận ở mỗi sản phẩm


- ở chức năng bình luận không bị filter đầu vào và lưu vào database cho nên em sử dụng 
![alt text](image.png)

- em sẽ comment vào sản phẩm này là <script>alert(1)</script>

sau đó em nhận được Comment của em hiển thị với chức năng như 1 thẻ <script> trong page
![alt text](image-1.png)

- Và khi đó bất kì người dùng nào vào đọc sản phẩm này của em đều sẽ bị dính phải 
![alt text](image-2.png)

- Và đây là lỗ hổng store XSS vì em có lưu nội dung của comment trong database.
![alt text](image-3.png)

- ở đây em sẽ dùng webhook
![alt text](image-4.png)
-Và sau khi load ảnh error thì sẽ gửi request đến webhook kèm cookie của nạn nhận với bất kì người dùng nào truy cập trang này
![alt text](image-5.png)

- vậy là em đã khai thác thành công lỗ hổng store XSS ạ.
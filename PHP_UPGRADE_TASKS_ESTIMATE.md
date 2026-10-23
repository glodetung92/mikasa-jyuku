# BẢNG TỔNG HỢP CÔNG VIỆC & ƯỚC TÍNH THỜI GIAN (TASK BREAKDOWN & ESTIMATION)
## Dự án: Nâng cấp phiên bản PHP 8.2.35 cho Hệ thống Website 三笠塾 (Mikasa Juku)

---

### I. MỤC TIÊU DỰ ÁN (PROJECT OBJECTIVES)
1. **Nâng cấp bảo mật**: Nâng cấp toàn diện môi trường PHP từ phiên bản cũ (PHP 7.4) lên **PHP 8.2.35** nhằm khắc phục các lỗ hổng bảo mật nghiêm trọng vừa được công bố (CVE-2026-109618, CVE-2026-109619).
2. **Đảm bảo tính liên tục**: Toàn bộ hệ thống (Trang chủ PHP thuần, Trang giới thiệu `/mikasa_hp/`, Blog `/blog/`) hoạt động ổn định, không gián đoạn dịch vụ, không mất mát dữ liệu.
3. **An toàn dữ liệu 100%**: Thực hiện sao lưu đa tầng (Code, Database, Server Config) trước khi tiến hành bất kỳ can thiệp nào.

---

### II. BẢNG CHI TIẾT CÁC ĐẦU VIỆC & ESTIMATE (TASK LIST & ESTIMATION)

| STT | Giai đoạn & Đầu việc (Tasks) | Mô tả chi tiết công việc | Thời gian ước tính (Giờ) |
| :---: | :--- | :--- | :---: |
| **I** | **GIAI ĐOẠN 1: CHUẨN BỊ & SAO LƯU DỰ PHÒNG (BACKUP & PREPARATION)** | | **2.5h** |
| 1.1 | Git Checkpoint & Tagging | Tạo Git Tag và nhánh dự phòng (`backup/pre-php82-stable`) đóng băng 100% mã nguồn đang chạy ổn định. | 0.5h |
| 1.2 | Backup cấu hình Server Local | Sao lưu các tệp cấu hình Apache (`mod_php.conf`) và `php.ini` hiện tại của Laragon. | 0.5h |
| 1.3 | Trích xuất toàn bộ Database Local | Sử dụng `mysqldump` trích xuất trọn vẹn 3 cơ sở dữ liệu (`kogaku-sha_mikasa_hp`, `kogaku-sha_mksdb`, `kogaku-sha_home`) lưu vào thư mục `backups/`. | 0.5h |
| 1.4 | Hỗ trợ/Thực hiện Backup Production | Đăng nhập phpMyAdmin trên Sakura Server để Export bản lưu trữ snapshot dữ liệu thực tế về máy tính cá nhân. | 1.0h |
| **II** | **GIAI ĐOẠN 2: THIẾT LẬP MÔI TRƯỜNG LOCAL PHP 8.2.35** | | **2.0h** |
| 2.1 | Cài đặt gói PHP 8.2.35 Thread-Safe | Tải bản phát hành chính thức từ php.net, kiểm tra mã băm SHA-256, giải nén và tích hợp vào Laragon. | 0.5h |
| 2.2 | Cấu hình `php.ini` chuẩn cho WordPress | Kích hoạt đầy đủ các module bắt buộc (`mysqli`, `mbstring`, `curl`, `openssl`, `gd`, `zip`, `fileinfo`...) và thiết lập bộ nhớ tối ưu (`memory_limit = 512M`, upload limits). | 1.0h |
| 2.3 | Cấu hình Apache & Kiểm tra nạp module | Liên kết Apache mod_php với thư viện PHP 8.2 (`php8apache2_4.dll`), khởi động và xác thực qua CLI `php -v`. | 0.5h |
| **III** | **GIAI ĐOẠN 3: RÀ SOÁT & CẬP NHẬT MÃ NGUỒN (CODE REFACTORING)** | | **4.5h** |
| 3.1 | Cập nhật tệp kết nối DB (`db_connection.php`) | Bổ sung xử lý ngoại lệ `try ... catch (mysqli_sql_exception $e)` và thiết lập mã hóa `utf8mb4` theo tiêu chuẩn mới của PHP 8.2. | 1.0h |
| 3.2 | Cập nhật tệp trang chủ (`index.php`) | Xử lý kiểm tra null-safety cho hàm `explode()`, kiểm tra an toàn kết quả query trước khi đọc `num_rows`. | 1.0h |
| 3.3 | Cập nhật script quản trị (`check_prod_users.php`) | Thay thế toán tử dập lỗi `@` bằng xử lý exception chuẩn tắc cho các kết nối đến Sakura Server. | 0.5h |
| 3.4 | Rà soát phân hệ WordPress (`/mikasa_hp/` & `/blog/`) | Kiểm tra tính tương thích của theme `author-landing-page`, `book-landing-page` và các hàm hook trên PHP 8.2. | 1.0h |
| 3.5 | Xử lý phân hệ `/home/` (WordPress 5.7) | Áp dụng phương án thống nhất (cấu hình chuyển hướng Redirect hoặc áp dụng bản vá tương thích). | 1.0h |
| **IV** | **GIAI ĐOẠN 4: KIỂM THỬ TOÀN DIỆN TRÊN LOCAL (LOCAL QA & TESTING)** | | **4.0h** |
| 4.1 | Kiểm tra cú pháp tự động (PHP Linting) | Chạy kiểm tra linting (`php -l`) tự động đối với toàn bộ các tệp tin PHP trong toàn bộ dự án. | 0.5h |
| 4.2 | Kiểm thử chức năng Trang chủ chính | Kiểm tra hiển thị giao diện, slide ảnh, các banner liên kết và Bảng tin (lấy đúng 20 bài viết mới nhất từ Database). | 1.0h |
| 4.3 | Kiểm thử chức năng WordPress & Admin | Kiểm thử truy cập `/mikasa_hp/` và `/blog/`, đăng nhập wp-admin, thử nghiệm đăng/sửa bài viết mới. | 1.5h |
| 4.4 | Kiểm tra nhật ký lỗi hệ thống (`debug.log`) | Rà soát toàn bộ log của WordPress và Apache để đảm bảo sạch 100% cảnh báo Deprecated hoặc Error. | 1.0h |
| **V** | **GIAI ĐOẠN 5: TRIỂN KHAI PRODUCTION & BÀN GIAO (DEPLOYMENT & HANDOVER)** | | **3.0h** |
| 5.1 | Triển khai mã nguồn qua CI/CD SFTP | Tạo commit chuẩn tắc, push lên nhánh `main` để GitHub Actions tự động đồng bộ mã nguồn an toàn lên Sakura Server. | 0.5h |
| 5.2 | Chuyển đổi phiên bản PHP trên Sakura Server | Đăng nhập Server Control Panel của Sakura, đổi cấu hình tại mục `言語のバージョン設定` sang PHP 8.2. | 0.5h |
| 5.3 | Kiểm thử nghiệm thu thực tế (Smoke Testing) | Kiểm tra trực tiếp trên domain chính `https://mikasajyuku.jp/` (Trang chủ, Tin tức, Bảng tin, Form liên hệ, tốc độ tải trang). | 1.0h |
| 5.4 | Bàn giao & Tài liệu nghiệm thu | Lập báo cáo kết quả nâng cấp, cập nhật tài liệu kỹ thuật dự án và bàn giao cho khách hàng. | 1.0h |
| **VI** | **DỰ PHÒNG RỦI RO & BẢO HÀNH (CONTINGENCY BUFFER)** | Thời gian dự phòng điều chỉnh phát sinh môi trường server thực tế. | **2.0h** |

---

### III. TỔNG KẾT THỜI GIAN & TIẾN ĐỘ THỰC HIỆN

* **Tổng thời gian dự kiến (Total Hours)**: **16.0 – 18.0 Giờ làm việc (Man-Hours)**
* **Tiến độ hoàn thành (Duration)**: **02 – 03 Ngày làm việc (Man-Days)**
* **Cam kết rủi ro (Rollback SLA)**: 
  - Nếu phát sinh bất kỳ sự cố nào không tương thích, thời gian khôi phục về trạng thái ban đầu là **dưới 3 phút** trên máy chủ Production và **dưới 1 phút** trên máy tính Local, tuyệt đối không gây gián đoạn truy cập cho người dùng.

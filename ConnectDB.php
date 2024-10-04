<?php
    class ConnectDB {
        // Biến kết nối
        protected $connection;

        // Thông tin kết nối cơ sở dữ liệu
        private $hostname = 'localhost';  // Địa chỉ máy chủ (localhost cho XAMPP)
        private $user = 'root';            // Tên người dùng MySQL mặc định là root
        private $password = '';            // Mật khẩu (để trống nếu không có, hoặc nhập mật khẩu nếu có)
        private $nameDB = 'quan_ly_chi_tieu';  // Tên cơ sở dữ liệu của bạn

        // Hàm khởi tạo kết nối đến cơ sở dữ liệu
        function __construct() {
            // Thực hiện kết nối đến MySQL
            $this->connection = mysqli_connect($this->hostname, $this->user, $this->password, $this->nameDB);

            // Kiểm tra kết nối và báo lỗi nếu không thành công
            if (mysqli_connect_errno()) {
                die('Failed to connect to MySQL: ' . mysqli_connect_error());
            }

            // Thiết lập charset cho kết nối là utf8
            mysqli_set_charset($this->connection, 'utf8');
        }

        // Hàm đóng kết nối (tùy chọn nếu cần đóng kết nối thủ công)
        function closeConnection() {
            if ($this->connection) {
                mysqli_close($this->connection);
            }
        }
    }
?>

<?php
// Bạn cần thay đổi các thông tin kết nối CSDL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "duanmau";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $conn = new PDO("mysql:host=$servername;duanmau=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Lấy dữ liệu từ form
        $ho_ten = $_POST['ho_ten'];
        $email = $_POST['email'];
        $sdt = $_POST['sdt'];
        $dia_chi = $_POST['dia_chi'];
        $phuong_thuc_tt = $_POST['phuong_thuc_tt'];
        $ghi_chu = $_POST['ghi_chu'];

        // Chuẩn bị và thực hiện truy vấn INSERT
        $stmt = $conn->prepare("INSERT INTO thanh_toan (ho_ten, email, sdt, dia_chi, phuong_thuc_tt, ghi_chu)
                                VALUES (:ho_ten, :email, :sdt, :dia_chi, :phuong_thuc_tt, :ghi_chu)");
        $stmt->bindParam(':ho_ten', $ho_ten);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':sdt', $sdt);
        $stmt->bindParam(':dia_chi', $dia_chi);
        $stmt->bindParam(':phuong_thuc_tt', $phuong_thuc_tt);
        $stmt->bindParam(':ghi_chu', $ghi_chu);
        $stmt->execute();

        // Thực hiện xử lý sau khi lưu dữ liệu vào CSDL (nếu cần)
        // Ví dụ: Hiển thị thông báo thành công, chuyển hướng đến trang khác
        header("Location: tt_thanh_cong.php");
        exit();
    } catch(PDOException $e) {
        // Xử lý lỗi kết nối CSDL
        echo "Lỗi: " . $e->getMessage();
    }
}
?>

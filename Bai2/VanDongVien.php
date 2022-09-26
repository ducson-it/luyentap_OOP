<?php
include './ConNguoi.php';
include './MonThiDau.php';

class VanDongVien extends ConNguoi
{
    protected $soHuyChuong;
    protected $cacMonDaThiDau;
    public function __construct($ten, $gioiTinh, $ngaySinh, $canNang, $chieuCao, $soHuyChuong,$cacMonDaThiDau)
    {
        parent::__construct($ten, $gioiTinh, $ngaySinh, $canNang,$chieuCao);
        $this->chieuCao = $chieuCao;
        $this->soHuyChuong = $soHuyChuong;
        $this->cacMonDaThiDau = $cacMonDaThiDau;
    }
    public function  hienThiThongTin()
    {   
        $monDaThiDau = implode(" ,",$this->cacMonDaThiDau);
        return "
            Tên vận động viên: $this->ten,   <br>
            Giới tính: $this->gioiTinh,  <br>
            Ngày sinh: $this->ngaySinh,  <br>
            Cân nặng: $this->canNang,  <br>
            Chiều cao: $this->chieuCao,  <br>
            Số huy chương: $this->soHuyChuong, <br>
            Các môn thi đấu: $monDaThiDau
        ";
    }
    public function thiDau($monThiDau, $soHuyChuong)
    {
        if ($this->chieuCao < $monThiDau->dieuKienChieuCao || $this->canNang < $monThiDau->dieuKienCanNang) {
            $this->soHuyChuong -= $soHuyChuong;
        }
        return "
        Số huy chương: $this->soHuyChuong
        ";
    }
}

echo '<pre>';
$monThiDau = new MonThiDau('abc', 123, 1248);
$vandongvien = new VanDongVien('a', 2, '2022/09/26', 2, 123, 123, ['a','b']);
echo '<h1>Thông tin vận động viên:</h1>';
echo $vandongvien->hienThiThongTin();
echo '<h1>Số huy chương:</h1>';
echo $vandongvien->thiDau($monThiDau,10);
echo '</pre>';
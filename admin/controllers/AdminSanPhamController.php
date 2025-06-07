<?php
class AdminSanPhamController
{

    public $modelSanPham;
    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelSanPham = new AdminSanPham();
        $this->modelDanhMuc = new AdminDanhMuc();
    }

    public function danhSachSanPham()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/sanpham/listSanPham.php';
    }
    public function formAddSanPham()
    {
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
            require_once './views/sanpham/addSanPham.php';
    }
        public function postAddSanPham()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $ten_san_pham = $_POST['ten_san_pham'];
            $gia_san_pham = $_POST['gia_san_pham'];
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'];
            $so_luong = $_POST['so_luong'];
            $ngay_nhap = $_POST['ngay_nhap'];
            $danh_muc_id = $_POST['danh_muc_id'];
            $trang_thai = $_POST['trang_thai'];
            $mo_ta = $_POST['mo_ta'];

            $hinh_anh = $_FILES['hinh_anh'];
            $file_thumb = uploadFile($hinh_anh , './uploads/');
            $img_array = $_FILES['img_array']; //mảng hình ảnh

            $errors=[];

            if(empty($ten_san_pham)){
                $errors['ten_san_pham'] = 'Tên Sản Phẩm Không Được Để Trống';
            }
            if(empty($gia_san_pham)){
                $errors['gia_san_pham'] = 'Giá Sản Phẩm Không Được Để Trống';
            }
            if(empty($gia_khuyen_mai)){
                $errors['gia_khuyen_mai'] = 'Giá Khuyến Mãi Không Được Để Trống';
            }
            if(empty($so_luong)){
                $errors['so_luong'] = 'Số Lượng Không Được Để Trống';
            }
            if(empty($ngay_nhap)){
                $errors['ngay_nhap'] = 'Ngày Nhập Không Được Để Trống';
            }
            if(empty($danh_muc_id)){
                $errors['danh_muc_id'] = 'Danh Mục ID Phải Chọn';
            }
            if(empty($trang_thai)){
                $errors['trang_thai'] = 'Trạng Thái Phải Chọn';
            }
            

            if(empty($errors)){
                $this->modelSanPham->InsertSanPham( $ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta,$file_thumb); 
                header("Location: " . BASE_URL_ADMIN . '?act=san-pham') ;
                
                exit();
            }
            else{require_once './views/sanpham/addSanPham.php';}

            }
    }

    //     public function formEditDanhmuc()
//     {
//         $id=$_GET['id_danh_muc'];
//         $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
//         if($danhMuc){require_once './views/danhmuc/editDanhMuc.php';}
//         else {header("Location: " . BASE_URL_ADMIN . '?act=danh-muc') ;exit();}
//     }
//     public function postEditDanhMuc()
//     {
//         if($_SERVER['REQUEST_METHOD']=='POST'){
//             $id = $_POST['id'];
//             $ten_danh_muc = $_POST['ten_danh_muc'];
//             $mo_ta = $_POST['mo_ta'];

    //             $errors=[];
//             if(empty($ten_danh_muc)){
//                 $errors['ten_danh_muc'] = 'Tên Danh Mục Không Được Để Trống';
//             }
//             if(empty($errors)){
//                 $this->modelDanhMuc->updateDanhMuc($id,$ten_danh_muc,$mo_ta); 
//                 header("Location: " . BASE_URL_ADMIN . '?act=danh-muc') ;
//                 exit();
//             }
//             else{
//                 $danhMuc=['id' => $id, 'ten_danh_muc' => $ten_danh_muc, 'mo_ta' => $mo_ta];
//                 require_once './views/danhmuc/editDanhMuc.php';
//             }

    //         }
//     }

    //     public function deleteDanhMuc(){
//         $id=$_GET['id_danh_muc'];
//         $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
//         if($danhMuc){
//             $this->modelDanhMuc->destroyDanhMuc($id);
//         }
//         header("Location: " . BASE_URL_ADMIN . '?act=danh-muc') ;
//         exit();
//     }
}

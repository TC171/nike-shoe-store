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
        //xóa session sau khi load trang
        deleteSessionError();
    }
        public function postAddSanPham()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';

            $hinh_anh = $_FILES['hinh_anh'] ?? null;
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
            if($hinh_anh['error'] !== 0){
                $errors['hinh_anh'] = 'Chưa Tải Ảnh Lên';
            }
            
            $_SESSION['error'] = $errors; 

            if(empty($errors)){
                $san_pham_id = $this->modelSanPham->InsertSanPham( $ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta,$file_thumb); 
                //xử lí thêm album ảnh sản phẩm img_array
                if (!empty($img_array['name'])) {
                    foreach ($img_array['name'] as $key => $value) {
                        $file = [
                            'name' => $img_array['name'][$key],
                            'type' => $img_array['type'][$key],
                            'tmp_name' => $img_array['tmp_name'][$key],
                            'error' => $img_array['error'][$key],
                            'size' => $img_array['size'][$key],
                        ];
                        $link_hinh_anh = uploadFile( $file, './uploads/' );
                        $san_pham_id = $this->modelSanPham->InsertAlbumSanPham($san_pham_id,$link_hinh_anh);
                    }
                }
                header("Location: " . BASE_URL_ADMIN . '?act=san-pham') ;
                exit();
            }else{
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-them-san-pham') ;
                exit();
            }

        }
    }

        public function formEditSanPham()
    {
        $id=$_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        if($sanPham){
            require_once './views/sanpham/editSanPham.php';
            deleteSessionError();
        }else {
            header("Location: " . BASE_URL_ADMIN . '?act=san-pham') ;exit();
        }
    }
    
    public function postEditSanPham()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $san_pham_id = $_POST['san_pham_id'] ??'';
            //Truy Vấn
            $sanPhamOld = $this->modelSanPham->getDetailSanPham($san_pham_id);
            $old_file = $sanPhamOld['hinh_anh']; 

            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';

            $hinh_anh = $_FILES['hinh_anh'] ?? null;
            // $file_thumb = uploadFile($hinh_anh , './uploads/');
            // $img_array = $_FILES['img_array']; //mảng hình ảnh

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
            if($hinh_anh['error'] !== 0){
                $errors['hinh_anh'] = 'Chưa Tải Ảnh Lên';
            }
            
            $_SESSION['error'] = $errors; 

            //logic sửa ảnh
            if (isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK) {
                //upload ảnh mới lên
                $new_file = uploadFile($hinh_anh, './uploads/');

                if (!empty($old_file)) {    //Nếu có ảnh cũ thì xóa đi
                    deleteFile($old_file);
                }
            }else{
                $new_file = $old_file;
            }

            if(empty($errors)){
                $this->modelSanPham->UpdateSanPham( $san_pham_id,$ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $new_file);  
                header("Location: " . BASE_URL_ADMIN . '?act=san-pham') ;
                exit();
            }else{
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $san_pham_id) ;
                exit();
            }
        }
    }

    public function postEditAnhSanPham() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $san_pham_id = $_POST['san_pham_id'] ?? '';
            $listAnhSanPhamCurrent = $this->modelSanPham->getListAnhSanPham($san_pham_id) ;
            $img_array = $$_FILES['img_array'];
            $img_delete = isset($_POST['img_delete']) ? explode(',',$_POST['img_delete']) : [] ;
            $current_img_ids = $_POST['current_img_ids'] ?? [];

            $upload_file = [];
            foreach ($img_array['name'] as $key=>$value){
                if ($img_array['error'][$key] == UPLOAD_ERR_OK ) {
                    $new_file = uploadFileAlbum($img_array ,'./uploads/' , $key);
                    if($new_file){
                        $upload_file[] = [
                            'id'=> $current_img_ids[$key] ?? null,
                            'file'=> $new_file
                        ]; 
                    }
                }
            }
            foreach ($upload_file as $file_info) {
                if ($file_info['id']) {
                    $old_file = $this->modelSanPham->getDetailAnhSanPham($file_info['id'])['link_hinh_anh'];
                    $this->modelSanPham->updateAnhSanPham($file_info['id'], $file_info['file']);
                    deleteFile($old_file);
                }else{
                    $this->modelSanPham->insertAlbumSanPham($san_pham_id, $file_info['file']);
                }
            }

            foreach ($listAnhSanPhamCurrent as $anhSP => $value) {
                $anh_id = $anhSP['id'];
                if(in_array($anh_id,$img_delete)){
                    //xóa ảnh trong db
                    $this->modelSanPham->destroyAnhSanPham($anh_id);
                    //xóa file
                    deleteFile($anhSP['link_hinh_anh']);
                }
            }
            header("Location: " . BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $san_pham_id) ;
            exit();
        }

    }
    //     public function deleteDanhMuc(){
    //     $id=$_GET['id_danh_muc'];
    //     $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
    //     if($danhMuc){
    //         $this->modelDanhMuc->destroyDanhMuc($id);
    //     }
    //     header("Location: " . BASE_URL_ADMIN . '?act=danh-muc') ;
    //     exit();
    // }
}

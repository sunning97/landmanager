<?php
session_start();

class LandController
{
    public function index($data = null)
    {

        if (!isset($_SESSION['login'])) {
            $_SESSION['flash']['title'] = 'Bạn chưa đăng nhập!';
            $_SESSION['flash']['mess'] = 'Vui lòng đăng nhâp trước khi sử dụng trang';
            $_SESSION['flash']['type'] = 'failure';

            header('location:index.php?ctl=User&act=login');
        } else {
            if ($data == null) {
                include_once('models/LandModel.php');

                $landModel = new LandModel();

                $lands = $landModel->getAllLand();

                include_once('views/LandView.php');

                $landView = new LandView();

                $landView->viewIndex($lands);
            } else {
                include_once('views/LandView.php');

                $landView = new LandView();

                $landView->viewIndex($data);
            }
        }

    }

    public function show()
    {
        if (!isset($_SESSION['login'])) {
            $_SESSION['flash']['title'] = 'Bạn chưa đăng nhập!';
            $_SESSION['flash']['mess'] = 'Vui lòng đăng nhâp trước khi sử dụng trang';
            $_SESSION['flash']['type'] = 'failure';
            header('location:index.php?ctl=User&act=login');
        } else {

            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                include_once('models/LandModel.php');
                $landModel = new LandModel();

                $land = $landModel->hasOne($id);

                include_once('views/LandView.php');

                $landView = new LandView();

                $landView->viewOne($land);


            } else {
                $data = array(
                    'type' => '404',
                    'title' => 'Lỗi!',
                    'content' => 'Không tìm thấy trang'
                );
                include_once('views/LandView.php');
                $landView = new LandView();
                $landView->viewError($data);
            }
        }
    }

    public function create()
    {
        if (!isset($_SESSION['login'])) {
            $_SESSION['flash']['title'] = 'Bạn chưa đăng nhập!';
            $_SESSION['flash']['mess'] = 'Vui lòng đăng nhâp trước khi sử dụng trang';
            $_SESSION['flash']['type'] = 'failure';
            header('location:index.php?ctl=User&act=login');
        } else {
            include_once('views/LandView.php');
            $landView = new LandView();
            $landView->viewCreate();
        }
    }

    //add new land
    public function add()
    {

        if (!isset($_SESSION['login'])) {
            $_SESSION['flash']['title'] = 'Bạn chưa đăng nhập!';
            $_SESSION['flash']['mess'] = 'Vui lòng đăng nhâp trước khi sử dụng trang';
            $_SESSION['flash']['type'] = 'failure';
            header('location:index.php?ctl=User&act=login');
        } else {
            //include

            include_once('modules/heap/heap-sort.php');
            include_once('modules/heap/Node.php');
            include_once('models/LandModel.php');
            include_once('models/DistrictModel.php');
            include_once('models/WardModel.php');
            include_once('models/OwnerModel.php');

            $landModel = new LandModel();
            $wardModel = new WardModel();
            $districtModel = new DistrictModel();

            if (isset($_POST['id_owner'])) {

                //get data post

                $land_acreage = $_POST['land_acreage'];
                $house_type_id = $_POST['house_type_id'];
                $purpose_use = $_POST['purpose_use'];
                $land_price = $_POST['land_price'];

                $district = $_POST['district'];
                $ward = $_POST['ward'];
                $street_house = $_POST['street_house'];

                $address = $street_house . ', ' . $wardModel->hasOne($ward)['name'] . ', ' . $districtModel->hasOne($district)['name'] . ' TP. Hồ Chí Minh';

                $data = array(
                    'land_acreage' => $land_acreage,
                    'house_type_id' => $house_type_id,
                    'purpose_use' => $purpose_use,
                    'land_price' => $land_price,
                    'land_owner' => $_POST['id_owner'],
                    'address' => $address
                );
                // insert data into database

                $result = $landModel->insert($data);

                if ($result) {


                    $lands = $landModel->getAllLand();

                    $Heap = new Heap('address');

                    foreach ($lands as $key => $val) {
                        $Node = new Node($val);
                        $Heap->insertAt($key, $Node);
                        $Heap->incrementSize();
                    }

                    $lands = heapsort($Heap);

                    $_SESSION['flash'] = array();
                    $_SESSION['flash'][0]['title'] = 'Thành công!';
                    $_SESSION['flash'][0]['mess'] = 'Thêm mới dữ liệu đất thành công';
                    $_SESSION['flash'][0]['content'] = 'add_success';

                    $this->index($lands);

                } else {
                    $_SESSION['flash'] = array();
                    $_SESSION['flash'][0]['title'] = 'Thất bại!';
                    $_SESSION['flash'][0]['mess'] = 'Thêm mới dữ liệu đất không thành công';
                    $_SESSION['flash'][0]['content'] = 'add_failure';
                    header('location:?ctl=Land&act=create');
                }

            } else {

                $ownerModel = new OwnerModel();

                $owner_name = $_POST['owner_name'];
                $owner_email = $_POST['owner_email'];
                $owner_phone = $_POST['owner_phone'];

                $owner = array(
                    'owner_name' => $owner_name,
                    'owner_email' => $owner_email,
                    'owner_phone' => $owner_phone
                );

                $a = $ownerModel->insert($owner);

                if ($a) {

                    $landModel = new LandModel();

                    $land_acreage = $_POST['land_acreage'];
                    $house_type_id = $_POST['house_type_id'];
                    $purpose_use = $_POST['purpose_use'];
                    $land_price = $_POST['land_price'];

                    $district = $_POST['district'];
                    $ward = $_POST['ward'];
                    $street_house = $_POST['street_house'];

                    $address = $street_house . ', ' . $wardModel->hasOne($ward)['name'] . ', ' . $districtModel->hasOne($district)['name'] . ' TP. Hồ Chí Minh';

                    $data = array(
                        'land_acreage' => $land_acreage,
                        'house_type_id' => $house_type_id,
                        'purpose_use' => $purpose_use,
                        'land_price' => $land_price,
                        'land_owner' => $a,
                        'address' => $address
                    );

                    $result = $landModel->insert($data);

                    if ($result) {

                        $lands = $landModel->getAllLand();

                        $Heap = new Heap('address');

                        foreach ($lands as $key => $val) {
                            $Node = new Node($val);
                            $Heap->insertAt($key, $Node);
                            $Heap->incrementSize();
                        }

                        $lands = heapsort($Heap);

                        $_SESSION['flash'] = array();
                        $_SESSION['flash'][0]['title'] = 'Thành công!';
                        $_SESSION['flash'][0]['mess'] = 'Thêm mới dữ liệu đất thành công';
                        $_SESSION['flash'][0]['content'] = 'add_success';

                        $this->index($lands);

                    } else {
                        $_SESSION['flash'] = array();
                        $_SESSION['flash'][0]['title'] = 'Thất bại!';
                        $_SESSION['flash'][0]['mess'] = 'Thêm mới dữ liệu đất không thành công';
                        $_SESSION['flash'][0]['content'] = 'add_failure';
                        header('location:?ctl=Land&act=create');
                    }
                }

            }
        }

    }

    // input file excel
    public function input()
    {
        if (!isset($_SESSION['login'])) {
            $_SESSION['flash']['title'] = 'Bạn chưa đăng nhập!';
            $_SESSION['flash']['mess'] = 'Vui lòng đăng nhâp trước khi sử dụng trang';
            $_SESSION['flash']['type'] = 'failure';
            header('location:index.php?ctl=User&act=login');
        } else {

            if (isset($_FILES['input_file'])) {
                // get data from excel file & inster into database
                $result = $this->getDataFromFIle();

                if (is_array($result)) {
                    //if error navigate to error page
                    include_once('views/LandView.php');
                    $landView = new LandView();
                    $landView->viewError($result);
                } else if ($result == true) {

                    $_SESSION['flash']['title'] = 'Thành công!';
                    $_SESSION['flash']['mess'] = 'Nhập dữ liệu từ file thành công!';
                    $_SESSION['flash']['type'] = 'success';

                    header('location:?ctl=Land&act=index');

                } else {
                    $_SESSION['flash'] = array();
                    $_SESSION['flash']['title'] = 'Thất bại!';
                    $_SESSION['flash']['mess'] = 'Nhập dữ liệu từ file không thành công';
                    $_SESSION['flash']['type'] = 'failure';
                    header('location:?ctl=Land&act=input');
                }

            } else {
                include_once('views/LandView.php');

                $lanView = new LandView();

                $lanView->viewInput();
            }
        }

    }

    //output file excel
    public function output()
    {
        if (!isset($_SESSION['login'])) {
            $_SESSION['flash']['title'] = 'Bạn chưa đăng nhập!';
            $_SESSION['flash']['mess'] = 'Vui lòng đăng nhâp trước khi sử dụng trang';
            $_SESSION['flash']['type'] = 'failure';
            header('location:index.php?ctl=User&act=login');
        } else {

            //include
            require "modules/php-excel/PHPExcel.php";
            include_once('models/LandModel.php');

            $landModel = new LandModel();

            $lands = $landModel->getAllLand();

            //if database land is empty navigate to error page

            if ($lands == null) {
                include_once('views/LandView.php');
                $landView = new LandView();
                $data = array(
                    'type' => '404',
                    'title' => 'Không tìm thấy dữ liệu!',
                    'content' => 'Không tìm thấy dữ liệu, không thể xuất file'
                );
                $landView->viewError($data);
            } else {

                $data = array();
                $owners = array();

                include_once('models/HouseModel.php');

                include_once('models/PurposeModel.php');

                include_once('models/OwnerModel.php');

                foreach ($lands as $land) {

                    //Get all data lands & owners

                    $house = HouseModel::hasOne($land['house_type_id'])['house_type_name'];
                    $pur = PurposeModel::hasOne($land['purpose_use'])['purpose_use_name'];

                    $owner = OwnerModel::hasOne($land['land_owner'])['owner_name'];

                    $item = array(
                        'owner' => $owner,
                        'acreage' => $land['land_acreage'],
                        'price' => $land['land_price'],
                        'house' => $house,
                        'pur' => $pur,
                        'address' => $land['address']
                    );

                    array_push($data, $item);

                }


                foreach ($data as $value) {
                    $owner = OwnerModel::searchh($value['owner']);

                    if ($owner != null) {
                        if (!in_array($owner, $owners)) {
                            array_push($owners, $owner);
                        }
                    }
                }

                $excel = new PHPExcel();

                // Write lands data into excel file

                $excel->setActiveSheetIndex(0);

                $excel->getActiveSheet()->setTitle('Dữ liệu nhà đất');

                $excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
                $excel->getActiveSheet()->getColumnDimension('B')->setWidth(80);
                $excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
                $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
                $excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
                $excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
                $excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);


                $excel->getActiveSheet()->getStyle('A1:G1')->getFont()->setBold(true);


                $excel->getActiveSheet()->setCellValue('A1', '#');
                $excel->getActiveSheet()->setCellValue('B1', 'Địa chỉ');
                $excel->getActiveSheet()->setCellValue('C1', 'Diện tích (m²)');
                $excel->getActiveSheet()->setCellValue('D1', 'Chủ sở hữu');
                $excel->getActiveSheet()->setCellValue('E1', 'Loại nhà');
                $excel->getActiveSheet()->setCellValue('F1', 'Sử dụng');
                $excel->getActiveSheet()->setCellValue('G1', 'Giá (VNĐ)');

                $numRow = 2;
                $i = 1;
                foreach ($data as $row) {
                    $excel->getActiveSheet()->setCellValue('A' . $numRow, $i);
                    $excel->getActiveSheet()->setCellValue('B' . $numRow, $row['address']);
                    $excel->getActiveSheet()->setCellValue('C' . $numRow, $row['acreage']);
                    $excel->getActiveSheet()->setCellValue('D' . $numRow, $row['owner']);
                    $excel->getActiveSheet()->setCellValue('E' . $numRow, $row['house']);
                    $excel->getActiveSheet()->setCellValue('F' . $numRow, $row['pur']);
                    $excel->getActiveSheet()->setCellValue('G' . $numRow, number_format($row['price']));
                    $numRow++;
                    $i++;

                }

                // Write owners data into excel file

                $excel->createSheet();

                $excel->setActiveSheetIndex(1);

                $excel->getActiveSheet()->setTitle('Thông tin chủ sở hữu');

                $excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
                $excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
                $excel->getActiveSheet()->getColumnDimension('C')->setWidth(40);
                $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);


                $excel->getActiveSheet()->getStyle('A1:D1')->getFont()->setBold(true);


                $excel->getActiveSheet()->setCellValue('A1', '#');
                $excel->getActiveSheet()->setCellValue('B1', 'Họ tên');
                $excel->getActiveSheet()->setCellValue('C1', 'Email');
                $excel->getActiveSheet()->setCellValue('D1', 'Số điện thoại');

                $numRow = 2;
                $i = 1;
                foreach ($owners as $row) {
                    $excel->getActiveSheet()->setCellValue('A' . $numRow,$i);
                    $excel->getActiveSheet()->setCellValue('B' . $numRow, $row[0]['owner_name']);
                    $excel->getActiveSheet()->setCellValue('C' . $numRow, $row[0]['owner_email']);
                    $excel->getActiveSheet()->setCellValue('D' . $numRow, $row[0]['owner_phone']);
                    $numRow++;
                    $i++;
                }

                //output file
                header('Content-Type: application/vnd.ms-excel');
                $filename = "Dữ liệu đất ngày " . date("d-m-Y") . ".xls";
                header('Content-Disposition: attachment;filename=' . $filename . ' ');
                header('Cache-Control: max-age=0');
                PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('php://output');
            }

        }
    }

    public function search()
    {
        if (!isset($_SESSION['login'])) {
            $_SESSION['flash']['title'] = 'Bạn chưa đăng nhập!';
            $_SESSION['flash']['mess'] = 'Vui lòng đăng nhâp trước khi sử dụng trang';
            $_SESSION['flash']['type'] = 'failure';
            header('location:index.php?ctl=User&act=login');
        } else {

            include_once('views/LandView.php');

            $landView = new LandView();

            $landView->viewSearch();
        }
    }

    //search file excel
    public function getSearch()
    {
        if (!isset($_SESSION['login'])) {
            $_SESSION['flash']['title'] = 'Bạn chưa đăng nhập!';
            $_SESSION['flash']['mess'] = 'Vui lòng đăng nhâp trước khi sử dụng trang';
            $_SESSION['flash']['type'] = 'failure';
            header('location:index.php?ctl=User&act=login');
        } else {
            if (isset($_POST['type'])) {
                //include
                include_once('models/LandModel.php');
                include_once('models/OwnerModel.php');
                include_once('modules/heap/heap-sort.php');
                include_once('modules/heap/Node.php');

                $landModel = new LandModel();
                $ownerModel = new OwnerModel();

                $type = $_POST['type'];
                $data = $_POST['data'];

                if ($type === 'owner') {

                    $result = '';

                    $owners = $ownerModel->searchh($data['name']);

                    if ($owners != null) {

                        $lands = array();

                        foreach ($owners as $owner) {
                            $land = $landModel->hasOwner($owner['id_owner']);
                            if ($land != null) {
                                foreach ($land as $item) {
                                    array_push($lands, $item);
                                }
                            } else break;

                        }

                        $result = $this->fetchTable($lands);

                    } else {
                        $result = '<br><h5>Không tìm thấy dữ liệu</h5>';
                    }

                    $output = array(
                        'result' => $result
                    );
                    echo json_encode($output);
                }
                if ($type === 'address') {

                    $address = preg_replace('/(đường|Đường|duong|dường|DUONG|ĐƯỜNG)/', '', $data['address']);
                    $address = preg_replace('/(quan|Quận|quạn|quận|Quan)/', 'Quận', $address);

                    $lands = $landModel->hasAddress($address);

                    $result = $this->fetchTable($lands, null);

                    $output = array(
                        'result' => $result
                    );

                    echo json_encode($output);
                }
                if ($type === 'acreage') {

                    $max = $data['max'];
                    $min = $data['min'];

                    $lands = $landModel->hasAcreage($max, $min);
                    if ($lands != null) {
                        $Heap = new Heap('acreage');

                        foreach ($lands as $key => $val) {
                            $Node = new Node($val);
                            $Heap->insertAt($key, $Node);
                            $Heap->incrementSize();
                        }

                        $result = heapsort($Heap);

                        $result = $this->fetchTable($result, null);
                    } else {
                        $result = '<br><h5>Không tìm thấy dữ liệu</h5>';
                    }
                    $output = array(
                        'result' => $result
                    );
                    echo json_encode($output);
                }
                if ($type === 'price') {

                    $max = $data['max'];
                    $min = $data['min'];

                    $lands = $landModel->hasPrice($max, $min);
                    if ($lands != null) {
                        $Heap = new Heap('price');

                        foreach ($lands as $key => $val) {
                            $Node = new Node($val);
                            $Heap->insertAt($key, $Node);
                            $Heap->incrementSize();
                        }

                        $result = heapsort($Heap);

                        $result = $this->fetchTable($result, null);
                    } else {
                        $result = '<br><h5>Không tìm thấy dữ liệu</h5>';
                    }

                    $output = array(
                        'result' => $result
                    );
                    echo json_encode($output);

                }
            }
        }
    }

    //sort all land by option
    public function sort()
    {
        if (!isset($_SESSION['login'])) {
            $_SESSION['flash']['title'] = 'Bạn chưa đăng nhập!';
            $_SESSION['flash']['mess'] = 'Vui lòng đăng nhâp trước khi sử dụng trang';
            $_SESSION['flash']['type'] = 'failure';
            header('location:index.php?ctl=User&act=login');
        } else {

            include_once('modules/heap/heap-sort.php');
            include_once('modules/heap/Node.php');

            include_once('models/LandModel.php');

            $landModel = new LandModel();

            $lands = $landModel->getAllLand();
            $output = array();

            if ($lands == null) {
                $output['state'] = 'empty';
            } else {

                $Heap = new Heap('address');

                foreach ($lands as $key => $val) {
                    $Node = new Node($val);
                    $Heap->insertAt($key, $Node);
                    $Heap->incrementSize();
                }

                $result = heapsort($Heap);
                $output['state'] = 'ok';
                $output['content'] = $this->fetchTable($result);
            }
            echo json_encode($output);
        }
    }

    //delete file excel
    public function del()
    {
        if (!isset($_SESSION['login'])) {
            $_SESSION['flash']['title'] = 'Bạn chưa đăng nhập!';
            $_SESSION['flash']['mess'] = 'Vui lòng đăng nhâp trước khi sử dụng trang';
            $_SESSION['flash']['type'] = 'failure';
            header('location:index.php?ctl=User&act=login');
        } else {

            $id_land = $_POST['land_id'];

            include_once('models/LandModel.php');
            $landModel = new LandModel();


            $result = $landModel->destroy($id_land);

            if ($result == true) {
                echo 'ok';
            } else {
                echo 'false';
            }
        }
    }

    //merge data with another data in file excel
    public function merge()
    {
        if (!isset($_SESSION['login'])) {
            $_SESSION['flash']['title'] = 'Bạn chưa đăng nhập!';
            $_SESSION['flash']['mess'] = 'Vui lòng đăng nhâp trước khi sử dụng trang';
            $_SESSION['flash']['type'] = 'failure';
            header('location:index.php?ctl=User&act=login');
        } else {
            if (isset($_FILES['input_file'])) {

                // include model & module

                include_once('modules/heap/heap-sort.php');
                include_once('modules/heap/Node.php');
                include_once('models/LandModel.php');

                //get another file excel & insert into database

                $result = $this->getDataFromFIle();

                if (is_array($result)) {
                    include_once('views/LandView.php');
                    $landView = new LandView();
                    $landView->viewError($result);
                } else if ($result == true) {

                    //Sort by selection & display

                    if ($_POST['sort_type'] == 1) {

                        $landModel = new LandModel();
                        $lands = $landModel->getAllLand();

                        $Heap = new Heap('price');

                        foreach ($lands as $key => $val) {
                            $Node = new Node($val);
                            $Heap->insertAt($key, $Node);
                            $Heap->incrementSize();
                        }

                        $result = heapsort($Heap);

                        $_SESSION['flash']['title'] = 'Thành công!';
                        $_SESSION['flash']['mess'] = 'Merge danh sách dữ liệu hiên tại và danh sách mới thành công';
                        $_SESSION['flash']['type'] = 'success';
                        $this->index($result);

                    } else if ($_POST['sort_type'] == 2) {
                        $landModel = new LandModel();
                        $lands = $landModel->getAllLand();

                        $Heap = new Heap('acreage');

                        foreach ($lands as $key => $val) {
                            $Node = new Node($val);
                            $Heap->insertAt($key, $Node);
                            $Heap->incrementSize();
                        }

                        $result = heapsort($Heap);

                        $_SESSION['flash'] = array();
                        $_SESSION['flash']['title'] = 'Thành công!';
                        $_SESSION['flash']['mess'] = 'Merge danh sách dữ liệu hiên tại và danh sách mới thành công';
                        $_SESSION['flash']['type'] = 'success';

                        $this->index($result);
                    } else {

                        $landModel = new LandModel();
                        $lands = $landModel->getAllLand();

                        $Heap = new Heap('address');

                        foreach ($lands as $key => $val) {
                            $Node = new Node($val);
                            $Heap->insertAt($key, $Node);
                            $Heap->incrementSize();
                        }

                        $result = heapsort($Heap);

                        $_SESSION['flash'] = array();
                        $_SESSION['flash']['title'] = 'Thành công!';
                        $_SESSION['flash']['mess'] = 'Merge danh sách dữ liệu hiên tại và danh sách mới thành công';
                        $_SESSION['flash']['type'] = 'success';

                        $this->index($result);
                    }

                } else {
                    $_SESSION['flash'] = array();
                    $_SESSION['flash']['title'] = 'Thát bại!';
                    $_SESSION['flash']['mess'] = 'Merge danh sách dữ liệu hiên tại và danh sách mới không thành công';
                    $_SESSION['flash']['type'] = 'failure';

                    header('location:?ctl=Land&act=merge');
                }

            } else {
                include_once('views/LandView.php');
                $landView = new LandView();
                $landView->viewMerge();
            }
        }
    }

    private function fetchTable($lands)
    {
        include_once('models/OwnerModel.php');

        if ($lands != null) {

            $result = '<div class="table-responsive">

                        <table id="order-listing" class="table">
                            <thead>
                            <tr class="text-center">
                                <th>Chủ sở hữu</th>
                                <th>Diện tích</th>
                                <th>Giá</th>
                                <th>Địa chỉ</th>
                                <th>Quản Lý</th>
                            </tr>
                            </thead>
                            <tbody>';
            $i = 1;
            foreach ($lands as $land) {
                $owner = OwnerModel::hasOne($land['land_owner']);

                $owner = $owner['owner_name'];

                $result .= '<tr class="text-center">

                        <td>
                            ' . $owner . '
                        </td>
                        <td>
                            ' . $land['land_acreage'] . ' m²
                        </td>
                        <td>
                            ' . number_format($land['land_price']) . ' VNĐ
                        </td>
                        <td class="text-left">
                            ' . $land['address'] . '
                        </td>
                        <td>
                        <div class="btn-group">
                            <button class="btn btn-primary btn-xs" href="#" style="color:white;cursor:pointer;height: 25px;line-height: 10px" id="_show" data-id="' . $land['land_id'] . '"><i class="fa fa-eye"></i> Xem</button>
                            <button class="btn btn-danger btn-xs" href="#" style="color:white;cursor:pointer;height: 25px;line-height: 10px" id="_delete" data-id="' . $land['land_id'] . '"><i class="fa fa-eye"></i> Xóa</button>
                        </div>
                        </td>
                        </tr>';

                $i++;
            }
            $result .= '</tbody></table></div>';

        } else {
            $result = '<br><h5>Không tìm thấy dữ liệu</h5>';
        }
        return $result;
    }

    private function getDataFromFIle()
    {
        //include

        include_once('models/OwnerModel.php');
        include_once('models/LandModel.php');
        include_once('models/HouseModel.php');
        include_once('models/PurposeModel.php');
        include_once('modules/land.php');

        //get file upload

        $file_name = $_FILES['input_file']['name'];
        $file_tmp = $_FILES['input_file']['tmp_name'];

        $explode = explode('.', $file_name);
        $ext = end($explode);
        $path = 'uploads/file/';
        $path = $path . basename($file_name);

        $allow = array('xlsx', 'xls');

        //if file extension not equal of array extension, navigation to error page

        if (in_array($ext, $allow) === false) {
            $data = array(
                'type' => '406',
                'title' => 'Lỗi!',
                'content' => 'Định dạng file không đúng, kiểm tra lại'
            );

            return $data;

        } else {

            move_uploaded_file($file_tmp, $path);

            $result = true;

            include_once('modules/php-excel/PHPExcel.php');

            $file = $path;
            $objFile = PHPExcel_IOFactory::identify($file);
            $objData = PHPExcel_IOFactory::createReader($objFile);

            $objData->setReadDataOnly(true);

            $objPHPExcel = $objData->load($file);


            // Get owner data from excel file


            $sheet = $objPHPExcel->setActiveSheetIndex(1);

            $Totalrow = $sheet->getHighestRow();
            $LastColumn = $sheet->getHighestColumn();


            $TotalCol = PHPExcel_Cell::columnIndexFromString($LastColumn);

            $data_owners = [];

            //Loop & push all row of file excel to $data_owners array

            for ($i = 2; $i <= $Totalrow; $i++) {
                for ($j = 1; $j < $TotalCol; $j++) {
                    $data_owners[$i - 2][$j] = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                }
            }

            $ownerModel = new OwnerModel();

            // Inster data owner into database
            foreach ($data_owners as $data) {
                if ($ownerModel->search($data[1], $data[2]) == null) {

                    $d = array(
                        'owner_name' => $data[1],
                        'owner_email' => $data[2],
                        'owner_phone' => $data[3]
                    );

                    $ownerModel->insert($d);
                }
            }

            // Get land data from excel file

            $sheet = $objPHPExcel->setActiveSheetIndex(0);

            $Totalrow = $sheet->getHighestRow();
            $LastColumn = $sheet->getHighestColumn();

            $TotalCol = PHPExcel_Cell::columnIndexFromString($LastColumn);

            $data_land = [];
            //Loop & push all row of file excel to $data_land
            for ($i = 2; $i <= $Totalrow; $i++) {

                for ($j = 0; $j < $TotalCol; $j++) {
                    $data_land[$i - 2][$j] = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                }
            }

            $arr = [];

            foreach ($data_land as $value) {
                $land = new Land($value[3], $value[2], $value[4], $value[5], str_replace(',', '', $value[6]), $value[1]);
                array_push($arr, $land);
            }

            $landModel = new LandModel();
            $houseModel = new HouseModel();
            $purposesModel = new PurposeModel();

            //Loop & insert data land into database
            foreach ($arr as $value) {

                $id_house = '';
                $id_pur = '';
                $id_own = '';
                $house = $houseModel->search($value->getHouseType());
                $pur = $purposesModel->search($value->getPurposeUse());
                $own = '';

                foreach ($data_owners as $tmp) {
                    if ($tmp[1] == $value->getOwner()) {
                        $own = $ownerModel->search($value->getOwner(), $tmp[2]);
                    }
                }

                if ($house != null) {
                    $id_house = $house['house_type_id'];
                }

                if ($pur != null) {
                    $id_pur = $pur['purpose_use_id'];
                }

                if ($own != null) {
                    $id_own = $own['id_owner'];
                }

                $dd = array(
                    'land_acreage' => $value->getAcreage(),
                    'house_type_id' => $id_house,
                    'purpose_use' => $id_pur,
                    'land_price' => $value->getPrice(),
                    'land_owner' => $id_own,
                    'address' => $value->getAddress()
                );

                $result = $landModel->insert($dd);

            }

            //delete file excel after upload & get all data
            unlink($path);

            return $result;
        }
    }
}
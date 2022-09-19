<div class="container-fluid bg-light ">
    <div class="container">
        <?php 
            if(isset($_SESSION['customer_id'])):
                $customer = new Customer();
                $customer_id = $_SESSION['customer_id'];
                $result = $customer->getCustomer($customer_id);
                $customer_lastname = $result['customer_lastname'];
                $customer_firstname = $result['customer_firstname'];
                $customer_email = $result['customer_email'];
                $customer_phone = $result['customer_phone'];
                $customer_render = $result['customer_render'];  
                $customer_birthday = $result['customer_birthday'];
                
        ?>
            <div class="row">
                <div class="col-4">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Active</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                </div>
                <div class="col-8 bg-white">
                    <h4>Hồ sơ của tôi</h4>
                    <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
                    <hr>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-8">
                                <form action="">
                                    <table class="table border border-white">
                                        <tbody>
                                            <tr>
                                                <td>Tên của bạn:</td>
                                                <td>Phan Thế Bảo</td>
                                            </tr>
                                            <tr>
                                                <td>Tài khoản Email:</td>
                                                <td>bao123@gmail.comments</td>
                                            </tr>
                                            <tr>
                                                <td>Số điện thoại:</td>
                                                <td>034123123</td>
                                            </tr>
                                            <tr>
                                                <td>Giới tính:</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                        <label class="form-check-label" for="inlineRadio1">Nam</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                        <label class="form-check-label" for="inlineRadio2">Nữ</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                                        <label class="form-check-label" for="inlineRadio3">Khác</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Ngày sinh:</td>
                                                <td>
                                                    
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>  
            <h1>Vui lòng bấm <a href="index.php?action=auth&act=login">để đăng nhập</a> hoặc <a href="index.php?action=auth&act=resgister">để tạo tài khoản</a></h1>
        <?php endif; ?>
    </div>
</div>
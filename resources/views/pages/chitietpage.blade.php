@extends('master-layout')
@section('content')

<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cho thuê thiết bị sự kiện</li>
                    </ol>
                </nav>
                <h2 class="entry-title">cho thuê thiết bị sự kiện</h2>
                <p>Với thế mạnh trong việc sản xuất, cung cấp và <u>cho thuê thiết bị sự kiện</u>, thiết bị quảng cáo
                    phục vụ sự kiện, <a href="#" style="color:red;">tổ chức sự kiện Tuấn Việt</a> có đầy đủ các thiết
                    bị, đa dạng về hình thức và kích thước phục vụ Quý khách hàng có nhu cầu.
                </p>
                <p>Một số trang thiết bị tiêu biểu và phổ biến trong các chương trình:</p>
                <p>-&nbsp;&nbsp; Nhà bạt kết cấu dạng dàn không gian (metro-form)</p>
                <p>-&nbsp;&nbsp; Nhà lều kết cấu sắt phi tròn 42 lắp ghép linh hoạt</p>
                <p>-&nbsp;&nbsp; Dù đại parachute nhiều kích cỡ: đường kính 10m, 12m, 15m, 18m, 20m…</p>
                <p>-&nbsp;&nbsp; Dù quảng cáo (đế gang/sắt, đường kính 2.2m hoặc 2.4m)</p>
                <p>-&nbsp;&nbsp; Gian hàng quảng cáo, gian hàng tiêu chuẩn</p>
                <p>-&nbsp;&nbsp; Cổng chào dàn không gian, cổng chào hơi</p>
                <p>-&nbsp;&nbsp; Rối hơi chào khách, rối quảng cáo, khí cầu quảng cáo</p>
                <p>-&nbsp;&nbsp; Hệ thống âm thanh chuyên nghiệp có khả năng phục vụ từ 100 đến 2.000 khán giả</p>
                <p>-&nbsp;&nbsp; Sân khấu, ánh sáng (đèn path, đèn skylight, moving head…)</p>
                <p>-&nbsp;&nbsp; Phát thanh: Loa phát thanh, loa hướng dẫn cầm tay, bộ đàm Kenwood</p>
                <p>-&nbsp;&nbsp; Bàn ghế phục vụ lễ hội: ghế chân quỳ, ghế nệm lưng tựa, ghế nhựa trắng lưng tựa, ghế em
                    bé, bàn 0.4×1.2m, bàn 0.8×1.2m, bàn 0.5x2m…</p>
                <p>-&nbsp;&nbsp; Giá X, standee cuộn, standee X các loại</p>
                <p>-&nbsp;&nbsp; Kệ tủ, quầy bar, ghế bar</p>
                <p>-&nbsp;&nbsp; Bộ dụng cụ phục vụ khánh thành, khai trương, động thổ, khởi công</p>
                <p>-&nbsp;&nbsp; Chén dĩa sứ cao cấp, ly tách phục vụ tiệc buffet, tiệc cưới…</p>
                <p>-&nbsp;&nbsp; Tổ chức tiệc cưới hỏi (dàn dựng, trang trí, tổ chức tại tư gia)</p>
                <p>-&nbsp;&nbsp; In bong bóng quảng cáo, sản xuất khí cầu theo yêu cầu</p>
                <p>-&nbsp;&nbsp; Và các dụng cụ khác (bục phát biểu gỗ, inox, tượng đài Bác Hồ, trụ barie inox, thảm,
                    palet gỗ, đèn halogen, đèn cao áp, bong bóng in quảng cáo, pháo lửa, pháo kim tuyến, quạt công
                    nghiệp, quạt phun sương…)</p>
                <p>Quý khách có thể xem thêm chi tiết trong hình ảnh.</p>
                <p class="img_tintuc">
                    <img src="images/tbsk2.jpg" alt="" class="img-fluid"><br>
                    <span class="caption-image">Thiết bị sự kiện</span>
                </p>
                <p class="img_tintuc">
                    <img src="images/tbsk3.jpg" alt="" class="img-fluid"><br>
                    <span class="caption-image">Thuê thiết bị sự kiện</span>
                </p>
                <p class="img_tintuc">
                    <img src="images/tbsk2.jpg" alt="" class="img-fluid"><br>
                    <span class="caption-image">cho thuê thiết bị sự kiện tại các tỉnh </span>
                </p>
                <p class="img_tintuc">
                    <img src="images/tbsk3.jpg" alt="" class="img-fluid"> <br>
                    <span class="caption-image">Thuê thiết bị sự kiện ở hà nội</span>
                </p>
                <p class="img_tintuc">
                    <img src="images/tbsk2.jpg" alt="" class="img-fluid"> <br>
                    <span class="caption-image">Tổ chức sự kiện</span>
                </p>
                <p class="img_tintuc">
                    <img src="images/tbsk3.jpg" alt="" class="img-fluid"> <br>
                    <span class="caption-image">Cho thuê đồ sự kiện</span>
                </p>
                <h3 class="widget">ADD A COMMENT</h3>
                <p class="your_email">Your email address will not be published.</p>
                <form action="">
                    <textarea rows="8" class="form-control"></textarea> <br>
                    <input type="text" placeholder="Name" class="form-control"> <br>
                    <input type="email" placeholder="Email" class="form-control"> <br>
                    <input type="text" placeholder="Website" class="form-control"> <br>
                    <input type="checkbox">Save my name, email, and website in this browser for the next time I comment.
                    <br>
                    <button class="btn-danger">ADD COMMENT</button>

                </form>
            </div> <!-- hết left-cont -->
            <div class="col-md-3 right_cont">
                <div class="blank">

                </div>
                <div class="sidebar">
                    <div>
                        <p class="tel"><a href="#">Phòng kinh doanh: 0123 456 789</a></p>
                        <p class="tel"><a href="#">Phòng kế toán: 0123 456 789</a></p>
                        <p class="tel"><a href="#">Quản lý sự kiện: 0123 465 789</a></p>
                        <p class="tel"><a href="#">Quản lý kho xưởng: 0123 456 789</a></p>
                    </div>
                    <div class="sidebar2">
                        <h3 class="widget">Sự kiện sắp diễn ra</h3>
                        <span><a href="#">Giới thiệu công ty </a>Mon, 1/02/2017 8:00 p.m</span> <br>
                        <span><a href="#">Địa điểm: </a>43 Cổ Nhuế, Hà Nội</span><br>
                        <span>Giá bán: 1,3 Tỷ VND 366 Căn hộ</span> <br>
                        <span><a href="#">Lể khởi công</a>Tue, 01/03/2017 8:00 p.m</span> <br>
                        <span>Giá bán: 1,3 Tỷ VND 366 Căn hộ</span> <br>
                        <span><a href="#">Thiết bị sự kiện</a>Tue, 01/03/2017 8:00 p.m</span> <br>
                        <span><a href="#">Địa điểm: </a>43 Cổ Nhuế, Hà Nội</span><br>
                        <span>Giá bán: 1,3 Tỷ VND 366 Căn hộ</span> <br>
                    </div>
                    <div class="sidebar3">
                        <div class="accordion-container">
                            <div class="box-1">

                                <div class="box-title">
                                    <p><i class="fas fa-caret-right"></i> ĐỊA CHỈ VĂN PHÒNG</p>
                                </div>

                                <div class="noidung">
                                    <p>
                                        <span>43 Cổ Nhuế, Phạm Văn Đồng, Hà Nội </span> <br>
                                        <span> Phone: 0123 456 789</span><br>
                                        <span>Email: abcxyz@gmail.com </span><br>
                                        <span>Giờ mở cửa: 8:00 - 17:30 Từ thứ 2 đến thứ 7</span><br>
                                    </p>
                                </div>

                            </div>

                            <div class="box-1">

                                <div class="box-title">
                                    <p><i class="fas fa-caret-right"></i> KHO TẠI HÀ NỘI</p>
                                </div>

                                <div class="noidung">
                                    <p>
                                        <span>- 43 Phạm Văn Đồng, Hà Nội</span> <br>
                                        <span>- 43 Phạm Văn Đồng, Hà Nội</span> <br>
                                        <span>- 43 Phạm Văn Đồng, Hà Nội</span> <br>
                                        <span>- 43 Phạm Văn Đồng, Hà Nội</span> <br>
                                        <span>- 43 Phạm Văn Đồng, Hà Nội</span> <br>
                                    </p>
                                </div>

                            </div>
                            <div class="box-1">

                                <div class="box-title">
                                    <p><i class="fas fa-caret-right"></i> KHO TẠI TP HỒ CHÍ MINH</p>
                                </div>

                                <div class="noidung">
                                    <p>
                                        <span>- 43 Phạm Văn Đồng, Hà Nội</span> <br>
                                        <span>- 43 Phạm Văn Đồng, Hà Nội</span> <br>
                                        <span>- 43 Phạm Văn Đồng, Hà Nội</span> <br>
                                        <span>- 43 Phạm Văn Đồng, Hà Nội</span> <br>
                                        <span>- 43 Phạm Văn Đồng, Hà Nội</span> <br>
                                    </p>
                                </div>

                            </div>



                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

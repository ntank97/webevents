<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // table user
        DB::table('role')->insert([
            'name' => 'admin',
        ]
        );
        DB::table('role')->insert([
            'name' => 'editor',
        ]
        );
        DB::table('role')->insert([
            'name' => 'user',
        ]
        );
        DB::table('users')->insert([
            'name' => 'admin@admin',
            'avatar' => 'dt1.jpg',
            'password' => bcrypt('123456789'),
            'level'=>1,
            'created_at'=> now()
        ]
        );
        DB::table('users')->insert([
            'name' => 'user1',
            'avatar' => 'dt1.jpg',
            'password' => bcrypt('123456'),
            'level'=>2,
            'created_at'=> now()
            ]
        );
        DB::table('users')->insert([
            'name' => 'user2',
            'avatar' => 'dt1.jpg',
            'password' => bcrypt('123456'),
            'level'=>3,
            'created_at'=> now()
            ]
        );
        //cate
        DB::table('cate_event')->insert([
            'name_cate' => 'cate demmo1',
            'type_cate' => 1,
            'created_at'=> now()
            ]
        );
        DB::table('cate_event')->insert([
            'name_cate' => 'cate demmo2',
            'type_cate' => 2,
            'created_at'=> now()
            ]
        );
        DB::table('cate_event')->insert([
            'name_cate' => 'cate demmo3',
            'type_Cate' => 3,
            'created_at'=> now()
            ]
        );
        //create events
        for ($i=0; $i < 30; $i++) { 
            DB::table('events')->insert([
                'photo_cover' => 'hot2.jpg',
                'title' => 'TỔ CHỨC HỘI NGHỊ KHÁCH HÀNG',
                'slug' => 'TỔ-CHỨC-HỘI-NGHỊ-KHÁCH-HÀNG'.$i,
                'content'=>'Tổ chức hội nghị khách hàng thường niên hằng năm của các công ty, tập đoàn, các tổ chức cá nhân nhằm tăng cường mối quan hệ thân thiết giữa khách hàng là người tiêu dùng, các thành viên cộng tác viên, các đại lý trung thành với đơn vị của quý khách.
                 Công ty Cổ phần truyền thông Tuấn Việt là đơn vị với gần mười năm năm tổ chức hội nghị khách hàng cho quý khách hàng trên toàn quốc và các dịch vụ như cung cấp, cho thuê Pg lễ tân hội nghị , cung cấp thiết bị sự kiện, cho thuê âm thanh, ánh sáng hội nghị, dịch vụ tổ chức sự kiện giá rẻ.<br>Tổ chức hội nghị khách hàng thường niên hằng năm của các công ty, tập đoàn, các tổ chức cá nhân nhằm tăng cường mối quan hệ thân thiết giữa khách hàng là người tiêu dùng, các thành viên cộng tác viên, các đại lý trung thành với đơn vị của quý khách.
                 Công ty Cổ phần truyền thông Tuấn Việt là đơn vị với gần mười năm năm tổ chức hội nghị khách hàng cho quý khách hàng trên toàn quốc và các dịch vụ như cung cấp, cho thuê Pg lễ tân hội nghị , cung cấp thiết bị sự kiện, cho thuê âm thanh, ánh sáng hội nghị, dịch vụ tổ chức sự kiện giá rẻ.<br>Tổ chức hội nghị khách hàng thường niên hằng năm của các công ty, tập đoàn, các tổ chức cá nhân nhằm tăng cường mối quan hệ thân thiết giữa khách hàng là người tiêu dùng, các thành viên cộng tác viên, các đại lý trung thành với đơn vị của quý khách.
                 Công ty Cổ phần truyền thông Tuấn Việt là đơn vị với gần mười năm năm tổ chức hội nghị khách hàng cho quý khách hàng trên toàn quốc và các dịch vụ như cung cấp, cho thuê Pg lễ tân hội nghị , cung cấp thiết bị sự kiện, cho thuê âm thanh, ánh sáng hội nghị, dịch vụ tổ chức sự kiện giá rẻ.<br>Tổ chức hội nghị khách hàng thường niên hằng năm của các công ty, tập đoàn, các tổ chức cá nhân nhằm tăng cường mối quan hệ thân thiết giữa khách hàng là người tiêu dùng, các thành viên cộng tác viên, các đại lý trung thành với đơn vị của quý khách.
                 Công ty Cổ phần truyền thông Tuấn Việt là đơn vị với gần mười năm năm tổ chức hội nghị khách hàng cho quý khách hàng trên toàn quốc và các dịch vụ như cung cấp, cho thuê Pg lễ tân hội nghị , cung cấp thiết bị sự kiện, cho thuê âm thanh, ánh sáng hội nghị, dịch vụ tổ chức sự kiện giá rẻ.<br>Tổ chức hội nghị khách hàng thường niên hằng năm của các công ty, tập đoàn, các tổ chức cá nhân nhằm tăng cường mối quan hệ thân thiết giữa khách hàng là người tiêu dùng, các thành viên cộng tác viên, các đại lý trung thành với đơn vị của quý khách.
                 Công ty Cổ phần truyền thông Tuấn Việt là đơn vị với gần mười năm năm tổ chức hội nghị khách hàng cho quý khách hàng trên toàn quốc và các dịch vụ như cung cấp, cho thuê Pg lễ tân hội nghị , cung cấp thiết bị sự kiện, cho thuê âm thanh, ánh sáng hội nghị, dịch vụ tổ chức sự kiện giá rẻ.<br>',
                'type'=> 1,
                'user_id'=> 1,
                'status'=> 1,
                'start_day'=> '2019-06-19 00:00:00',
                'end_day'=> '2019-07-18 00:00:00',
                'cate' => 1,
                'created_at'=> now()
                ]
            );
        }
        for ($i=13; $i < 23; $i++) { 
            DB::table('events')->insert([
                'photo_cover' => 'dt2.jpg',
                'title' => 'CUNG CẤP MC ĐÁM CƯỚI',
                'slug' => 'CUNG-CẤP-MC-ĐÁM-CƯỚI'.$i,
                'content'=>'Tổ chức hội nghị khách hàng thường niên hằng năm của các công ty, tập đoàn, các tổ chức cá nhân nhằm tăng cường mối quan hệ thân thiết giữa khách hàng là người tiêu dùng, các thành viên cộng tác viên, các đại lý trung thành với đơn vị của quý khách.
                 Công ty Cổ phần truyền thông Tuấn Việt là đơn vị với gần mười năm năm tổ chức hội nghị khách hàng cho quý khách hàng trên toàn quốc và các dịch vụ như cung cấp, cho thuê Pg lễ tân hội nghị , cung cấp thiết bị sự kiện, cho thuê âm thanh, ánh sáng hội nghị, dịch vụ tổ chức sự kiện giá rẻ.Tổ chức hội nghị khách hàng thường niên hằng năm của các công ty, tập đoàn, các tổ chức cá nhân nhằm tăng cường mối quan hệ thân thiết giữa khách hàng là người tiêu dùng, các thành viên cộng tác viên, các đại lý trung thành với đơn vị của quý khách.
                 Công ty Cổ phần truyền thông Tuấn Việt là đơn vị với gần mười năm năm tổ chức hội nghị khách hàng cho quý khách hàng trên toàn quốc và các dịch vụ như cung cấp, cho thuê Pg lễ tân hội nghị , cung cấp thiết bị sự kiện, cho thuê âm thanh, ánh sáng hội nghị, dịch vụ tổ chức sự kiện giá rẻ.<br>Tổ chức hội nghị khách hàng thường niên hằng năm của các công ty, tập đoàn, các tổ chức cá nhân nhằm tăng cường mối quan hệ thân thiết giữa khách hàng là người tiêu dùng, các thành viên cộng tác viên, các đại lý trung thành với đơn vị của quý khách.
                 Công ty Cổ phần truyền thông Tuấn Việt là đơn vị với gần mười năm năm tổ chức hội nghị khách hàng cho quý khách hàng trên toàn quốc và các dịch vụ như cung cấp, cho thuê Pg lễ tân hội nghị , cung cấp thiết bị sự kiện, cho thuê âm thanh, ánh sáng hội nghị, dịch vụ tổ chức sự kiện giá rẻ.<br>Tổ chức hội nghị khách hàng thường niên hằng năm của các công ty, tập đoàn, các tổ chức cá nhân nhằm tăng cường mối quan hệ thân thiết giữa khách hàng là người tiêu dùng, các thành viên cộng tác viên, các đại lý trung thành với đơn vị của quý khách.
                 Công ty Cổ phần truyền thông Tuấn Việt là đơn vị với gần mười năm năm tổ chức hội nghị khách hàng cho quý khách hàng trên toàn quốc và các dịch vụ như cung cấp, cho thuê Pg lễ tân hội nghị , cung cấp thiết bị sự kiện, cho thuê âm thanh, ánh sáng hội nghị, dịch vụ tổ chức sự kiện giá rẻ.<br>',
                'type'=> 2,
                'user_id'=> 1,
                'status'=> 1,
                'start_day'=> '2019-06-19 00:00:00',
                'end_day'=> '2019-07-18 00:00:00',
                'cate' => 2,
                'created_at'=> now()
                ]
            );
        }
        for ($i=24; $i < 55; $i++) { 
            DB::table('events')->insert([
                'photo_cover' => 'chitietsukien3.jpg',
                'title' => 'Cho thuê sân khấu tổ chức sự kiện',
                'slug' => 'Cho-thuê-sân-khấu-tổ-chức-sự-kiện'.$i,
                'content'=>'Tổ chức hội nghị khách hàng thường niên hằng năm của các công ty, tập đoàn, các tổ chức cá nhân nhằm tăng cường mối quan hệ thân thiết giữa khách hàng là người tiêu dùng, các thành viên cộng tác viên, các đại lý trung thành với đơn vị của quý khách.
                 Công ty Cổ phần truyền thông Tuấn Việt là đơn vị với gần mười năm năm tổ chức hội nghị khách hàng cho quý khách hàng trên toàn quốc và các dịch vụ như cung cấp, cho thuê Pg lễ tân hội nghị , cung cấp thiết bị sự kiện, cho thuê âm thanh, ánh sáng hội nghị, dịch vụ tổ chức sự kiện giá rẻ.Tổ chức hội nghị khách hàng thường niên hằng năm của các công ty, tập đoàn, các tổ chức cá nhân nhằm tăng cường mối quan hệ thân thiết giữa khách hàng là người tiêu dùng, các thành viên cộng tác viên, các đại lý trung thành với đơn vị của quý khách.
                 Công ty Cổ phần truyền thông Tuấn Việt là đơn vị với gần mười năm năm tổ chức hội nghị khách hàng cho quý khách hàng trên toàn quốc và các dịch vụ như cung cấp, cho thuê Pg lễ tân hội nghị , cung cấp thiết bị sự kiện, cho thuê âm thanh, ánh sáng hội nghị, dịch vụ tổ chức sự kiện giá rẻ.<br>Tổ chức hội nghị khách hàng thường niên hằng năm của các công ty, tập đoàn, các tổ chức cá nhân nhằm tăng cường mối quan hệ thân thiết giữa khách hàng là người tiêu dùng, các thành viên cộng tác viên, các đại lý trung thành với đơn vị của quý khách.
                 Công ty Cổ phần truyền thông Tuấn Việt là đơn vị với gần mười năm năm tổ chức hội nghị khách hàng cho quý khách hàng trên toàn quốc và các dịch vụ như cung cấp, cho thuê Pg lễ tân hội nghị , cung cấp thiết bị sự kiện, cho thuê âm thanh, ánh sáng hội nghị, dịch vụ tổ chức sự kiện giá rẻ.<br>Tổ chức hội nghị khách hàng thường niên hằng năm của các công ty, tập đoàn, các tổ chức cá nhân nhằm tăng cường mối quan hệ thân thiết giữa khách hàng là người tiêu dùng, các thành viên cộng tác viên, các đại lý trung thành với đơn vị của quý khách.
                 Công ty Cổ phần truyền thông Tuấn Việt là đơn vị với gần mười năm năm tổ chức hội nghị khách hàng cho quý khách hàng trên toàn quốc và các dịch vụ như cung cấp, cho thuê Pg lễ tân hội nghị , cung cấp thiết bị sự kiện, cho thuê âm thanh, ánh sáng hội nghị, dịch vụ tổ chức sự kiện giá rẻ.<br>Tổ chức hội nghị khách hàng thường niên hằng năm của các công ty, tập đoàn, các tổ chức cá nhân nhằm tăng cường mối quan hệ thân thiết giữa khách hàng là người tiêu dùng, các thành viên cộng tác viên, các đại lý trung thành với đơn vị của quý khách.
                 Công ty Cổ phần truyền thông Tuấn Việt là đơn vị với gần mười năm năm tổ chức hội nghị khách hàng cho quý khách hàng trên toàn quốc và các dịch vụ như cung cấp, cho thuê Pg lễ tân hội nghị , cung cấp thiết bị sự kiện, cho thuê âm thanh, ánh sáng hội nghị, dịch vụ tổ chức sự kiện giá rẻ.<br>',
                'type'=> 3,
                'user_id'=> 1,
                'status'=> 1,
                'start_day'=> '2019-06-19 00:00:00',
                'end_day'=> '2019-07-18 00:00:00',
                'cate' => 3,
                'created_at'=> now()
                ]
            );
        }
        //intro
        DB::table('introduce')->insert([
            'content' => 'Công ty Tổ Chức Sự Kiện Tuấn Việt được thành lập năm 2009. Đến nay Tuấn Việt là một doanh nghiệp hàng đầu trong lĩnh vực phục vụ Tổ Chức Sự Kiện & Cung Cấp Thiết Bị Sự Kiện.
            CÔNG TY TỔ CHỨC SỰ KIỆN
            Công ty tổ chức sự kiện luôn đáp ứng được những yêu cầu công nghệ,kỹ thuật mới nhất, làm thỏa mãn những mọi yêu cầu khó tính nhất của khách hàng.. Với phương châm “Sáng tạo không giới hạn!” Chúng tôi sẵn sàng tạo ra sự đột phá về phong cách trong tổ chức các sự kiện cũng như các sản phẩm chúng tôi cung cấp. Là một nhà tổ chức sự kiện chuyên nghiệp: Uy tín và chất lượng dịch vụ là tiêu chí quan trọng nhất trong sản phẩm của chúng tôi.
            Chúng tôi luôn đáp ứng được những yêu cầu công nghệ,kỹ thuật mới nhất, làm thỏa mãn những mọi yêu cầu khó tính nhất của khách hàng.. Với phương châm “Sáng tạo không giới hạn!” Chúng tôi sẵn sàng tạo ra sự đột phá về phong cách trong tổ chức các sự kiện cũng như các sản phẩm chúng tôi cung cấp. Là một nhà tổ chức sự kiện chuyên nghiệp: Uy tín và chất lượng dịch vụ là tiêu chí quan trọng nhất trong sản phẩm của chúng tôi.',
            'created_at'=> now()
            ]
        );
        //tema
        DB::table('team')->insert([
            'content' => 'Công ty Tổ Chức Sự Kiện Tuấn Việt được thành lập năm 2009. Đến nay Tuấn Việt là một doanh nghiệp hàng đầu trong lĩnh vực phục vụ Tổ Chức Sự Kiện & Cung Cấp Thiết Bị Sự Kiện.
            CÔNG TY TỔ CHỨC SỰ KIỆN
            Công ty tổ chức sự kiện luôn đáp ứng được những yêu cầu công nghệ,kỹ thuật mới nhất, làm thỏa mãn những mọi yêu cầu khó tính nhất của khách hàng.. Với phương châm “Sáng tạo không giới hạn!” Chúng tôi sẵn sàng tạo ra sự đột phá về phong cách trong tổ chức các sự kiện cũng như các sản phẩm chúng tôi cung cấp. Là một nhà tổ chức sự kiện chuyên nghiệp: Uy tín và chất lượng dịch vụ là tiêu chí quan trọng nhất trong sản phẩm của chúng tôi.
            Chúng tôi luôn đáp ứng được những yêu cầu công nghệ,kỹ thuật mới nhất, làm thỏa mãn những mọi yêu cầu khó tính nhất của khách hàng.. Với phương châm “Sáng tạo không giới hạn!” Chúng tôi sẵn sàng tạo ra sự đột phá về phong cách trong tổ chức các sự kiện cũng như các sản phẩm chúng tôi cung cấp. Là một nhà tổ chức sự kiện chuyên nghiệp: Uy tín và chất lượng dịch vụ là tiêu chí quan trọng nhất trong sản phẩm của chúng tôi.',
            'created_at'=> now()
            ]
        );
      //contacts
        DB::table('contacts')->insert([
            'content' => 'Công ty Tổ Chức Sự Kiện Tuấn Việt được thành lập năm 2009. Đến nay Tuấn Việt là một doanh nghiệp hàng đầu trong lĩnh vực phục vụ Tổ Chức Sự Kiện & Cung Cấp Thiết Bị Sự Kiện.
            CÔNG TY TỔ CHỨC SỰ KIỆN
            Công ty tổ chức sự kiện luôn đáp ứng được những yêu cầu công nghệ,kỹ thuật mới nhất, làm thỏa mãn những mọi yêu cầu khó tính nhất của khách hàng.. Với phương châm “Sáng tạo không giới hạn!” Chúng tôi sẵn sàng tạo ra sự đột phá về phong cách trong tổ chức các sự kiện cũng như các sản phẩm chúng tôi cung cấp. Là một nhà tổ chức sự kiện chuyên nghiệp: Uy tín và chất lượng dịch vụ là tiêu chí quan trọng nhất trong sản phẩm của chúng tôi.
            Chúng tôi luôn đáp ứng được những yêu cầu công nghệ,kỹ thuật mới nhất, làm thỏa mãn những mọi yêu cầu khó tính nhất của khách hàng.. Với phương châm “Sáng tạo không giới hạn!” Chúng tôi sẵn sàng tạo ra sự đột phá về phong cách trong tổ chức các sự kiện cũng như các sản phẩm chúng tôi cung cấp. Là một nhà tổ chức sự kiện chuyên nghiệp: Uy tín và chất lượng dịch vụ là tiêu chí quan trọng nhất trong sản phẩm của chúng tôi.',
            'name_company' => 'tailent wins',
            'address' => 'ha noi',
            'store' => 'ha noi',
            'phone' => 123456789,
            'email' => 'abc@gamil.com',
            'site' => 'tailentwins.com',
            'created_at'=> now()
            ]
        );
        //blog
        for ($i=0; $i < 12; $i++) { 
            DB::table('blog')->insert([
                'photo_cover' => 'tcsk1.jpg',
                'slug' => 'LỄ-KHAI-TRƯƠNG-CỬA-HÀN'.$i,
                'title' => 'LỄ KHAI TRƯƠNG CỬA HÀN',
                'content' => 'Công ty Tổ Chức Sự Kiện Tuấn Việt được thành lập năm 2009. Đến nay Tuấn Việt là một doanh nghiệp hàng đầu trong lĩnh vực phục vụ Tổ Chức Sự Kiện & Cung Cấp Thiết Bị Sự Kiện.
                CÔNG TY TỔ CHỨC SỰ KIỆN
                Công ty tổ chức sự kiện luôn đáp ứng được những yêu cầu công nghệ,kỹ thuật mới nhất, làm thỏa mãn những mọi yêu cầu khó tính nhất của khách hàng.. Với phương châm “Sáng tạo không giới hạn!” Chúng tôi sẵn sàng tạo ra sự đột phá về phong cách trong tổ chức các sự kiện cũng như các sản phẩm chúng tôi cung cấp. Là một nhà tổ chức sự kiện chuyên nghiệp: Uy tín và chất lượng dịch vụ là tiêu chí quan trọng nhất trong sản phẩm của chúng tôi.
                Chúng tôi luôn đáp ứng được những yêu cầu công nghệ,kỹ thuật mới nhất, làm thỏa mãn những mọi yêu cầu khó tính nhất của khách hàng.. Với phương châm “Sáng tạo không giới hạn!” Chúng tôi sẵn sàng tạo ra sự đột phá về phong cách trong tổ chức các sự kiện cũng như các sản phẩm chúng tôi cung cấp. Là một nhà tổ chức sự kiện chuyên nghiệp: Uy tín và chất lượng dịch vụ là tiêu chí quan trọng nhất trong sản phẩm của chúng tôi.',
                'short_cut' => 'Tiếp nối chuỗi thành công của cơ sở 1 thì ngày 25/03/2019 – cửa hàng',
                'status' => 1,
                'user_id' => 1,
                'created_at'=> now()
                ]
            );
        }
        for ($i=0; $i < 4; $i++) { 
            DB::table('custommer')->insert([
                'slug' => 'Mr-Phan-Văn-Hoàng'.$i,
                'avatar' => 'member.jpg',
                'name' => 'Mr Phan Văn Hoàng ',
                'comment' => 'Là đơn vị chuyên trách về xây dựng các nhà máy nước ngoài đặt tại Việt Nam, chúng tôi thật sự yên tâm khi lựa chọn Tuấn Việt Event là đối tác tổ chức sự kiện cho các chương trình của khách hàng. Tuấn Việt Event giúp cho tôi tiết kiệm được thời gian chuẩn bị. Cảm ơn sự kiện Tuấn Việt…',
                'work' => 'Marketing manager – Giza Việt Nam',
                'status' => 1,
                'created_at'=> now()
                ]
            );
        }
        //imgaes
        DB::table('images')->insert([
            'thumbnail' => 'logo.png',
            'type' => 3,
            'created_at'=> now()
            ]
        );
         //imgaes
        DB::table('images')->insert([
            'thumbnail' => 'slide1.jpg',
            'type' => 1,
            'created_at'=> now()
            ]
        );
        DB::table('images')->insert([
            'thumbnail' => 'slide2.jpg',
            'type' => 1,
            'created_at'=> now()
            ]
        );
        DB::table('images')->insert([
            'thumbnail' => 'slide3.jpg',
            'type' => 1,
            'created_at'=> now()
            ]
        );
        //partner
        DB::table('partner')->insert([
            'photo_prtner' => 'vtv.jpg',
            'name' => 'vtv',
            'created_at'=> now()
            ]
        );
        DB::table('partner')->insert([
            'photo_prtner' => 'ford.jpg',
            'name' => 'ford',
            'created_at'=> now()
            ]
        );
        DB::table('partner')->insert([
            'photo_prtner' => 'sc.jpg',
            'name' => 'sc',
            'created_at'=> now()
            ]
        );
    }
}

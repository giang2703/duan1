$(document).ready(function () {
    //========Form đăng ký=================//

    $('#form_dang_ki').validate({
        rules: {
            ho_ten: {
                required: true,
                minlength: 6,
            },
            ma_kh: {
                required: true,
                remote: 'check.php',
                minlength: 5,
            },
            email: {
                required: true,
                email: true,
                remote: 'check.php',
            },
            mat_khau: {
                required: true,
                minlength: 6,
            },
            mat_khau2: {
                required: true,
                equalTo: '#mat_khau',
                minlength: 6,
            },
        },
        messages: {
            ho_ten: {
                required: 'Họ tên không được để trống',
                minlength: 'Tối thiểu 6 ký tự',
            },
            ma_kh: {
                required: 'Tên đăng nhập không được để trống',
                remote: 'Tên đăng nhập đã tồn tại',
                minlength: 'Tối thiểu 5 ký tự',
            },
            email: {
                required: 'Email không được để trống',
                remote: 'Email đã tồn tại, vui lòng sử dụng email khác!',
                email: 'Email không hợp lệ ',
            },
            mat_khau: {
                required: 'Mật khẩu không được để trống',
                minlength: 'Hãy nhập ít nhất 6 ký tự',
            },
            mat_khau2: {
                required: 'Xác nhận mật khẩu không được để trống',
                equalTo: 'Xác nhận mật khẩu không khớp',
                minlength: 'Hãy nhập ít nhất 6 ký tự',
            },
        },
    });

    //================Form đăng nhập================//

    $('#form_login').validate({
        rules: {
            ma_kh: {
                required: true,
            },
            mat_khau: {
                required: true,
            },
        },
        messages: {
            ma_kh: {
                required: 'Hãy điền tên đăng nhập',
            },
            mat_khau: {
                required: 'Hãy điền mật khẩu',
            },
        },
    });
    //================Form quên mật khẩu================//

    $('#form_quen_mk').validate({
        rules: {
            ma_kh: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
        },
        messages: {
            ma_kh: {
                required: 'Hãy nhập tên đăng nhập',
            },
            email: {
                required: 'Hãy nhập email',
                email: 'Email không đúng định dạng!',
            },
        },
    });

    //================Form đổi mật khẩu================//

    $('#form_doi_mk').validate({
        rules: {
            mat_khau: {
                required: true,
                // remote: "check_user.php?id=" + ma_kh,
            },
            mat_khau2: {
                required: true,
                minlength: 6,
            },
            mat_khau3: {
                required: true,
                equalTo: '#mat_khau2',
            },
        },
        messages: {
            mat_khau: {
                required: 'Hãy nhập mật khẩu cũ',
            },
            mat_khau2: {
                required: 'Hãy nhập mật khẩu mới',
                minlength: 'Mật khẩu phải ít nhất 6 kí tự ',
            },
            mat_khau3: {
                required: 'Hãy nhập xác nhận mật khẩu mới',
                equalTo: 'Mật khẩu không khớp',
            },
        },
    });

    //================Form cập nhật tài khoản khách hàng================//

    $('#update_tk').validate({
        rules: {
            ho_ten: {
                required: true,
                minlength: 6,
            },
            email: {
                required: true,
                email: true,
                // remote: 'check.php',
            },
        },
        messages: {
            ho_ten: {
                required: 'Vui lòng điền họ tên',
                minlength: 'Hãy nhập tối thiểu 6 ký tự',
            },
            email: {
                required: 'Vui lòng điền email',
                // remote: 'Email đã tồn tại, vui lòng nhập email khác!',
                email: 'Email không hợp lệ ',
            },
        },
    });

    //==========================ADMIN=====================//
    //======================================================//
    //============================Form add loại================//
    $('#add_loai').validate({
        rules: {
            ten_loai: {
                required: true,
                remote: 'check-loai.php?act=add',
            },
        },
        messages: {
            ten_loai: {
                required: 'Loại hàng không được trống',
                remote: 'Loại hàng đã tồn tại',
            },
        },
    });

    //============================Form cập nhật loại================//

    var ma_loai = $("input[name='ma_loai']").val();
    $('#edit_loai').validate({
        rules: {
            ten_loai: {
                required: true,
                remote: 'check-loai.php?act=update&ma_loai=' + ma_loai,
            },
        },
        messages: {
            ten_loai: {
                required: 'Vui lòng nhập tên loại hàng ',
                remote: 'Tên loại hàng đã tồn tại',
            },
        },
    });
    //============================Form admin add tài khoản khách hàng================//

    $('#admin_add_kh').validate({
        rules: {
            ma_kh: {
                required: true,
                minlength: 6,
                remote: 'check.php',
            },
            ho_ten: {
                required: true,
                minlength: 6,
            },
            email: {
                required: true,
                email: true,
                remote: 'check.php',
            },
            mat_khau: {
                required: true,
                minlength: 6,
            },
            mat_khau2: {
                required: true,
                minlength: 6,
                equalTo: '#mat_khau',
            },
        },
        messages: {
            ma_kh: {
                required: 'Vui lòng điền mã kh',
                minlength: 'Hãy nhập tối thiểu 6 ký tự',
                remote: 'Mã kh đã tồn tại',
            },
            ho_ten: {
                required: 'Vui lòng điền họ tên',
                minlength: 'Hãy nhập tối thiểu 6 ký tự',
            },
            email: {
                required: 'Vui lòng điền email',
                email: 'Email không hợp lệ ',
                remote: 'Email đã tồn tại',
            },
            mat_khau: {
                required: 'Vui lòng điền mật khẩu',
                minlength: 'Hãy nhập ít nhất 6 ký tự',
            },
            mat_khau2: {
                required: 'Vui lòng điền mật khẩu',
                equalTo: 'Mật khẩu không trùng nhau',
                minlength: 'Hãy nhập ít nhất 6 ký tự',
            },
        },
    });
    //============================Form admin cập nhật tài khoản khách hàng================//

    $('#admin_update_kh').validate({
        rules: {
            ho_ten: {
                required: true,
                minlength: 6,
            },
            email: {
                required: true,
                email: true,
                // remote: 'check_user.php?act=update&ma_kh=' + ma_kh,
            },
            mat_khau: {
                required: true,
                minlength: 6,
            },
            mat_khau2: {
                required: true,
                minlength: 6,
                equalTo: '#mat_khau',
            },
        },
        messages: {
            ho_ten: {
                required: 'Vui lòng điền họ tên',
                minlength: 'Hãy nhập tối thiểu 6 ký tự',
            },
            email: {
                required: 'Vui lòng điền email',
                email: 'Email không hợp lệ ',
                // remote: "Email đã tồn tại",
            },
            mat_khau: {
                required: 'Vui lòng điền mật khẩu',
                minlength: 'Hãy nhập ít nhất 6 ký tự',
            },
            mat_khau2: {
                required: 'Vui lòng điền mật khẩu',
                equalTo: 'Mật khẩu không trùng nhau',
                minlength: 'Hãy nhập ít nhất 6 ký tự',
            },
        },
    });
    //============================Form admin add hàng hóa================//

    $.validator.addMethod(
        'lessThanEqual',
        function (value, element, param) {
            if (this.optional(element)) return true;
            var i = parseInt(value);
            var j = parseInt($(param).val());
            return i <= j;
        },
        'The value {0} must be less than {1}'
    );
    $('#add_hang_hoa').validate({
        rules: {
            ten_hh: {
                required: true,
                remote: 'check-hang-hoa.php?act=add',
            },
            don_gia: {
                required: true,
                min: 0,
            },
            giam_gia: {
                required: true,
                min: 0,
                lessThanEqual: '#don_gia',
            },
            ngay_nhap: {
                required: true,
            },
            hinh: {
                required: true,
            },
        },
        messages: {
            ten_hh: {
                required: 'Vui lòng điền tên hàng hóa',
                remote: 'Tên hàng hóa đã tồn tại',
            },
            don_gia: {
                required: 'Vui lòng điền đơn giá vnđ',
                min: 'Đơn giá phải lớn hơn 0',
            },
            giam_gia: {
                required: 'Vui lòng điền giảm giá vnđ',
                min: 'giảm giá phải lớn hơn 0',
                lessThanEqual: 'Giá đã giảm phải nhỏ hơn đơn giá',
            },
            ngay_nhap: {
                required: 'Vui lòng chọn ngày nhập',
            },
            hinh: 'Vui lòng chọn ảnh',
        },
    });

    var ma_hh = $("input[name='ma_hh']").val();
    $('#update_hang_hoa').validate({
        rules: {
            ten_hh: {
                required: true,
                remote: 'check-hang-hoa.php?act=update&ma_hh=' + ma_hh,
            },
            don_gia: {
                required: true,
                min: 0,
            },
            giam_gia: {
                required: true,
                min: 0,
                lessThanEqual: '#don_gia',
            },
            mo_ta: {
                required: true,
            },
            ngay_nhap: {
                required: true,
            },
        },
        messages: {
            ten_hh: {
                required: 'Vui lòng điền tên hàng hóa',
                remote: 'Tên hàng hóa đã tồn tại',
            },
            don_gia: {
                required: 'Vui lòng điền đơn giá',
                min: 'Đơn giá phải lớn hơn 0',
            },
            giam_gia: {
                required: 'Vui lòng điền giảm giá vnđ',
                min: 'giảm giá phải lớn hơn 0',
                lessThanEqual: 'Giá đã giảm phải nhỏ hơn đơn giá',
            },
            mo_ta: {
                required: 'Vui lòng điền mô tả',
            },
            ngay_nhap: {
                required: 'Vui lòng chọn ngày nhập',
            },
        },
    });
});

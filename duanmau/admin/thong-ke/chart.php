<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load("current", {
    packages: ["corechart"]
});
//sử dụng cho việt tạo biểu đồ
google.charts.setOnLoadCallback(drawChart);
//ể xử lý vẽ biểu đồ sau khi thư viện Google Charts đã được nạp hoàn toàn.
 

function drawChart() { // vẽ biểu đồ gg nó lấy 1 tham số data 
    var data = google.visualization.arrayToDataTable([ //ược sử dụng để chuyển đổi mảng thành DataTable Google Visualization
        ['Loại', 'Số Lượng'],
        <?php
            foreach ($items as $item) { // vòng lặp, lặp qua mảng $items
                echo "['$item[ten_loai]',     $item[so_luong]],"; // tạo hàng trong data table vs dữ liệu $items 
                //Nó sử dụng tên loại ($item['ten_loai']) và số lượng ($item['so_luong']) để tạo một hàng trong DataTable.
            }
            ?>
    ]);

    var options = {
        title: 'TỶ LỆ HÀNG HÓA',
        is3D: true, // biểu đồ vẽ dưới dạng 3d
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
    // cách tạo đối tượng hình tròn 'google.visualization.PieChart'
    chart.draw(data, options);
    //Dòng này vẽ biểu đồ Pie 3D sử dụng dữ liệu và tùy chọn được cung cấp
}
</script>
</head>
<style>
        /* CSS để tạo kiểu cho danh sách */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1300px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 20px;
            text-align: center;  
            font-weight: bold; 
            color: #C19FD6 ;  
        }

        .btn-success,
        .btn-primary,
        .btn-danger{
            color: #333;
            background-color: #fff;
            border: 1px solid #B495C9;
        }

        .btn-success:hover,
        .btn-primary:hover,
        .btn-danger:hover {
            background-color: #B495C9;
            border: 1px solid #B495C9;

        }

    </style>
<body>
    <div class="container mt-5">
        <h2>BIỂU ĐỒ THỐNG KÊ</h2>
        <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
        <!-- kích thước tỉ lệ biểu đồ -->
        <a href="index.php?list" class="btn btn-success "> Quay lại </a>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký ưu đãi mới</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            background: #f8f9fa;
            padding: 20px;
        }
        .email-container {
            background: #fff;
            border: 1px solid #dee2e6;
            padding: 20px;
            border-radius: 8px;
        }
        h2 {
            color: #38b19e;
            margin-bottom: 20px;
        }
        .info-row {
            margin-bottom: 10px;
        }
        .info-label {
            font-weight: bold;
            width: 150px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <h2>Đăng ký ưu đãi từ khách hàng</h2>
        
        <div class="info-row">
            <span class="info-label">Khách sạn:</span>
            <span>{{ $promotion->product->name ?? 'Không xác định' }}</span>
        </div>

        <div class="info-row">
            <span class="info-label">Ưu đãi:</span>
            <span>{{ $promotion->name ?? 'Không xác định' }}</span>
        </div>

        <div class="info-row">
            <span class="info-label">Thời gian gửi:</span>
            <span>{{ \Carbon\Carbon::parse($created_at)->setTimezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i') }}</span>
        </div>

        <hr>

        <h4>Thông tin người đăng ký</h4>

        <div class="info-row">
            <span class="info-label">Họ tên:</span>
            <span>{{ $data['name'] }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Email:</span>
            <span>{{ $data['email'] }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Số điện thoại:</span>
            <span>{{ $data['phone'] }}</span>
        </div>
        @if(!empty($data['content']))
        <div class="info-row">
            <span class="info-label">Lời nhắn:</span>
            <span>{{ $data['content'] }}</span>
        </div>
        @endif
    </div>
</body>
</html>

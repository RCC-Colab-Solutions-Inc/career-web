<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interview Response - RCC</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body style="margin: 0; padding: 0; font-family: 'Poppins', Arial, sans-serif; background-color: #f0f0f0; display: flex; justify-content: center; align-items: center; min-height: 100vh;">
    <div style="max-width: 600px; background: white; padding: 40px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); text-align: center;">
        <img src="/assets/RCCLogo.png" alt="RCC Logo" style="height: 50px; margin-bottom: 30px;">
        
        @if($status === 'accepted')
            <h2 style="color: #28a745; margin-bottom: 20px;">✓ Interview Accepted</h2>
        @else
            <h2 style="color: #dc3545; margin-bottom: 20px;">✗ Interview Declined</h2>
        @endif
        
        <p style="color: #666; font-size: 16px; line-height: 1.6;">{{ $message }}</p>
        
        <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee;">
            <p style="color: #999; font-size: 14px;">You can close this window now.</p>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Creation - RCC</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body style="margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', Arial, sans-serif; background-color: #f0f0f0; display: flex; justify-content: center; align-items: center; min-height: 100vh; padding: 20px;">
    <div style="width: 100%; max-width: 800px; background-color: white; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <div style="background-color: #0A2472; padding: 20px; text-align: left;">
            <span style="color: white; font-size: 12px; font-weight: bold;">RCC Logo</span>
        </div>
        
        <div style="padding: 40px;">
            <h1 style="color: #0A2472; font-size: 32px; margin-bottom: 10px;">Account Creation</h1>
            <p style="color: #666; font-size: 18px; margin-bottom: 30px;">Your information has been successfully added.</p>
            
            <table style="width: 100%; border-collapse: collapse; margin: 30px 0; border: 1px solid #ddd; color: #0A2472;">
                <tr>
                    <th style="padding: 15px; border: 2px solid #ddd; width: 50%; text-align: left;">Email</th>
                    <td style="padding: 15px; border: 2px solid #ddd; width: 50%; text-align: left;">{{$email}}</td>
                </tr>
                <tr>
                    <th style="padding: 15px; border: 2px solid #ddd; width: 50%; text-align: left;">Password</th>
                    <td style="padding: 15px; border: 2px solid #ddd; width: 50%; text-align: left;">{{$password}}</td>
                </tr>
            </table>
            
            <a href="#" style="display: inline-block; background-color: #0A2472; color: white; padding: 15px 30px; text-decoration: none; border-radius: 8px; font-weight: bold; margin-bottom: 30px; width: 200px; text-align: center;">Log In</a>
            
            <p style="color: #0A2472; margin-bottom: 20px;">You can change your password by log in it in the RCC Web.</p>
            
            <p style="color: #666; margin-bottom: 30px;">This is an automatic Email. Please Do not Reply.</p>
        </div>
        
        <div style="background-color: #0A2472; color: white; padding: 15px; text-align: center; font-size: 14px;">
            ©2025 RCC Colab Solutions Inc., All Right Reserved.
        </div>
    </div>
</body>
</html>
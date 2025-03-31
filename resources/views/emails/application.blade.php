<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Successfully Submitted - RCC</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', Arial, sans-serif;
        }
        
        body {
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            width: 100%;
            max-width: 800px;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .header {
            background-color: #0A2472;
            padding: 20px;
            text-align: left;
        }
        
        .logo {
            height: 40px;
        }
        
        .content {
            padding: 40px;
        }
        
        h1 {
            color: #0A2472;
            font-size: 32px;
            margin-bottom: 10px;
        }
        
        .subtitle {
            color: #666;
            font-size: 18px;
            margin-bottom: 30px;
        }
        
        table {
    		width: 100%;
    		border-collapse: collapse;
    		margin: 30px 0;
    		border: 1px solid #ddd;
		color: #0A2472;
	}

	th, td {
    		padding: 15px;
    		border: 2px solid #ddd;
	}

	th, td {
    		width: 50%;
	}

	th {
    		text-align: left;
	}

	td {
    		text-align: left;
	}

	td[colspan="2"] {
    		text-align: center;
	}
        
        .button {
            display: inline-block;
            background-color: #0A2472;
            color: white;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            margin-bottom: 30px;
        }
        
        .note {
            color: #666;
            margin-bottom: 30px;
        }
        
        .footer {
            background-color: #0A2472;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
		<text x="45" y="25" font-size="12" font-weight="bold">RCC Logo</text>
        </div>
        
        <div class="content">
            <h1>Application Successfully Submitted</h1>
            <p class="subtitle">New application has submitted.</p>
            
            <table>
                <tr>
                    <td colspan="2" style="text-align: center; font-weight: bold;">20250326-001</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>Kent C. Cortiguerra</td>
                </tr>
                <tr>
                    <th>Position</th>
                    <td>Mid Java Developer</td>
                </tr>
            </table>
            
            <a href="#" class="button">View Dashboard</a>
            
            <p class="note">This is an automatic Email. Please Do not Reply.</p>
        </div>
        
        <div class="footer">
            ©2025 RCC Colab Solutions Inc., All Right Reserved.
        </div>
    </div>
</body>
</html>
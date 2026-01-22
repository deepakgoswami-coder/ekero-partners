<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Reset OTP</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f6f8; font-family: Arial, Helvetica, sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="padding:20px;">
    <tr>
        <td align="center">

            <table width="600" cellpadding="0" cellspacing="0" style="
                background-color:#ffffff;
                padding:32px;
                border-radius:8px;
                box-shadow:0 2px 8px rgba(0,0,0,0.05);
            ">

                <!-- Brand -->
                <tr>
                    <td style="text-align:center; padding-bottom:20px;">
                        <h2 style="margin:0; color:#1f2937;">
                            Ekero Partners
                        </h2>
                    </td>
                </tr>

                <!-- Content -->
                <tr>
                    <td style="color:#374151; font-size:15px; line-height:24px;">
                        <p>Hello {{ $user->name ?? 'there' }},</p>

                        <p>
                            We received a request to reset the password for your
                            <strong>Ekero Partners</strong> account.
                        </p>

                        <p>
                            Please use the One-Time Password (OTP) below to verify your identity
                            and continue resetting your password:
                        </p>

                        <!-- OTP Box -->
                        <div style="text-align:center; margin:32px 0;">
                            <span style="
                                display:inline-block;
                                background-color:#2563eb;
                                color:#ffffff;
                                font-size:28px;
                                font-weight:bold;
                                letter-spacing:6px;
                                padding:14px 28px;
                                border-radius:6px;
                            ">
                                {{ $otp }}
                            </span>
                        </div>

                        <p>
                            This OTP is valid for <strong>10 minutes</strong>.
                            If the code expires, please request a new one.
                        </p>

                        <!-- Security Notice -->
                        <p style="color:#6b7280; font-size:14px;">
                            🔒 <strong>Security notice:</strong><br>
                            Do not share this OTP with anyone.
                            Ekero Partners will never ask for your OTP via phone, email, or messages.
                        </p>

                        <p>
                            If you did not request this password reset, please ignore this email or contact our support team for assistance.
                        </p>
                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td style="padding-top:28px; font-size:13px; color:#6b7280;">
                        <p>
                            Regards,<br>
                            <strong>Ekero Partners Team</strong>
                        </p>

                        <p style="font-size:12px; color:#9ca3af;">
                            This is an automated message. Please do not reply.
                        </p>
                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>

</body>
</html>

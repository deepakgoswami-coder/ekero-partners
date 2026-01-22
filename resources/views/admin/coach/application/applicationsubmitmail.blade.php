<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Coach Application Submitted</title>
</head>
<body style="font-family: Arial, Helvetica, sans-serif; background-color:#f9fafb; padding:20px;">

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0"
                       style="background:#ffffff; padding:24px; border-radius:8px;">

                    <!-- Greeting -->
                    <tr>
                        <td>
                            <p style="font-size:16px; color:#333;">
                                Hello <strong>{{ $application->full_name }}</strong>,
                            </p>

                            <p style="font-size:15px; color:#555;">
                                We’re happy to let you know that your <strong>Coach Application</strong>
                                has been submitted successfully.
                            </p>
                        </td>
                    </tr>

                    <!-- Details -->
                    <tr>
                        <td style="padding:16px 0;">
                            <p style="font-size:15px; color:#333; margin-bottom:8px;">
                                <strong>Your Submitted Details</strong>
                            </p>

                            <p style="font-size:14px; color:#555; line-height:1.6;">
                                 <strong>Email:</strong> {{ $application->email }} <br>
                                 <strong>Phone:</strong> {{ $application->mobile }}
                            </p>
                        </td>
                    </tr>

                    <!-- Message -->
                    <tr>
                        <td>
                            <p style="font-size:15px; color:#555; line-height:1.6;">
                                Thank you for applying to join us as a Coach.
                                Your profile is currently under review by our admin team.
                            </p>

                            <p style="font-size:15px; color:#555; line-height:1.6;">
                                Once your application is approved and your <strong>Coach ID</strong>
                                is created, we will notify you via email.
                            </p>

                            <p style="font-size:15px; color:#555; line-height:1.6;">
                                We truly appreciate your patience and look forward to welcoming
                                you onboard.
                            </p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="padding-top:20px;">
                            <p style="font-size:14px; color:#555;">
                                Warm regards,<br>
                                <strong>Ekero Partners Team</strong>
                            </p>
                        </td>
                    </tr>

                </table>

                <p style="font-size:12px; color:#999; margin-top:12px;">
                    This is an automated email. Please do not reply.
                </p>
            </td>
        </tr>
    </table>

</body>
</html>

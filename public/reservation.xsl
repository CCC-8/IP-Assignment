<?xml version="1.0" encoding="UTF-8" ?>
<xsl:stylesheet version="1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                xmlns:msxsl="urn:schemas-microsoft-com:xslt">
    <xsl:template match="/">
        <html>
      
            <head>
                <title>Report</title>
            </head>
            <body>
                <div style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);width: 1000px;margin:10px auto;padding:10px 20px;">
                    <h1 style="text-align: center;margin-top:20px">Reservation Report </h1>
                    <table style="border-collapse:collapse; width:60%; margin-left:auto; margin-right:auto; margin-top:50px;">
                        <!--                        <xsl:for-each select="reservations/reservation">
                            <tr>
                            <xsl:if test="checkInDate">  
                                <td style="padding:10px">
                                    <xsl:value-of select="checkInDate"/>
                                </td>
                            </xsl:if>
                                <td style="padding:10px">
                                    <xsl:value-of select="checkOutDate"/>
                                </td>
                               
                                <td style="padding:10px">
                                    <xsl:value-of select="roomType"/>
                                </td>
                                <td style="padding:10px">
                                    <xsl:value-of select="user_id"/>
                                </td>
                                <td style="padding:10px">
                                    <xsl:value-of select="paymentStatus"/>
                                </td>
                                <td style="padding:10px">
                                    <xsl:value-of select="totalMealCost"/>
                                </td>
                            </tr>
                        </xsl:for-each>-->
                        <tr style="padding:10px;">
                            <td colspan="2" style="text-align:center;font-weight: bold;font-size:18px;padding:10px;">
                                Year - 2023
                            </td>
                            
                        </tr>
                        <tr style="padding:10px;">
                            <td style="text-align:right;width:60%;font-weight: bold;font-size:18px;padding:10px;">
                                Total Reservations :
                            </td>
                            <td style="width:40%;font-size:18px;font-weight:bold;">
                                <xsl:value-of select="count(reservations/reservation)"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:right;width:60%;font-weight: bold;font-size:18px;padding:10px;">
                                Total Reservations for Premium Room :
                            </td>
                            <td style="width:40%;font-size:18px;font-weight:bold;">
                                <xsl:value-of select='count(reservations/reservation[roomType="Premium"])'/>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:right;width:60%;font-weight: bold;font-size:18px;padding:10px;">
                                Total Reservations for Luxury Room :
                            </td>
                            <td style="width:40%;font-size:18px;font-weight:bold;">
                                <xsl:value-of select='count(reservations/reservation[roomType="Luxury"])'/>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:right;width:60%;font-weight: bold;font-size:18px;padding:10px;">
                                Total Reservations for Normal Room :
                            </td>
                            <td style="width:40%;font-size:18px;font-weight:bold;">
                                <xsl:value-of select='count(reservations/reservation[roomType="Normal"])'/>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:right;width:60%;font-weight: bold;font-size:18px;padding:10px;">
                                Total Revenue from Meals :
                            </td>
                            <td style="width:40%;font-size:18px;font-weight:bold;">
                                <xsl:value-of select="sum(reservations/reservation/totalMealCost)"/>
                            </td>
                        </tr>
                    </table>
                    <br />
                  
                    <div style="text-align:center;">
                        <a href="/backend/reservations">
                            <Button style="color:white;background-color:black;width:100px;height:50px;cursor:pointer;border-radius:15px;font-size:18px;">Leave</Button>
                        </a>
                        <Button style="margin-left:10px;color:white;background-color:black;width:100px;height:50px;cursor:pointer;border-radius:15px;font-size:18px;" onclick="window.print()">Print</Button>
                    </div>
                </div>
            </body>     
        </html>
    </xsl:template>
</xsl:stylesheet>


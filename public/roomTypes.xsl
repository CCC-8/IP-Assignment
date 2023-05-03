<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html" />

    <xsl:template match="/">
        <!-- <html>
            <head>
                <title>Room Types</title>
            </head>
            <body>
                <h3 style="text-align: center; margin-top:20px">Room Types</h3>
                <table border="1" style="border-collapse: collapse; width: 80%; margin-left: auto; margin-right:
        auto; margin-top:
        20px">
                    <tr bgcolor="#f2f2f2">
                        <th style="text-align:center;padding:10px">ID</th>
                        <th style="text-align:center;padding:10px">Room Type</th>
                        <th style="text-align:center;padding:10px">Max Capacity</th>
                        <th style="text-align:center;padding:10px">Price / Night</th>
                        <th style="text-align:center;padding:10px">Jacuzzi</th>
                        <th style="text-align:center;padding:10px">Balcony</th>
                        <th style="text-align:center;padding:10px">Sea View</th>
                        <th style="text-align:center;padding:10px">Image</th>
                    </tr>
                    <xsl:for-each select="roomTypes/roomType">
                        <tr>
                            <td style="padding:10px">
                                <xsl:value-of select="@id" />
                            </td>
                            <td style="padding:10px">
                                <xsl:value-of select="name" />
                            </td>
                            <td style="padding:10px">
                                <xsl:value-of select="roomCapacity" />
                            </td>
                            <td style="padding:10px">
                                <xsl:value-of select="pricePerNight" />
                            </td>
                            <td style="padding:10px">
                                <xsl:value-of select="hasJacuzzi" />
                            </td>
                            <td style="padding:10px">
                                <xsl:value-of select="hasBalcony" />
                            </td>
                            <td style="padding:10px">
                                <xsl:value-of select="hasSeaView" />
                            </td>
                            <td style="padding:10px">
                                <xsl:value-of select="image" />/
                            </td>
                            <td><a href="/RoomDetails/{@id}">More Details</a></td>
                        </tr>
                    </xsl:for-each>
                </table>
                <br />
                <h4 style="text-align:center">Total Room Types : <xsl:value-of select="count(roomTypes/roomType)"
        /></h4> 
            </body>
        </html> -->

        <html>
            <head>
                <title>Room Types</title>
            </head>
            <body
                style="background: linear-gradient(45deg, white 0%, grey 100%); font-family: sans-serif ">
                <a href="/">Back to Home</a><br />
                <a href="/ReservationDetails">Your Reservations</a>
                <div class="container" style="display: flex;justify-content: center;">
                    <div class="row" style="display: flex;flex-wrap: wrap;justify-content: center;">
                        <xsl:for-each select="roomTypes/roomType">
                            <div class="column"
                                style="flex-basis: calc(33.33% - 20px);margin: 10px;margin-top: 5%;">
                                <div class="card"
                                    style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);transition: 0.3s;">
                                    <xsl:variable name="image" select="image" />
                                    <img src="{$image}" style="width:100%" />
                                    <div class="container"
                                        style="padding: 2px 16px; text-align: center;">
                                        <h3>
                                            <xsl:value-of select="name" /> Room </h3>
                                        <br />
                                        <p>Max Capacity: <xsl:value-of select="roomCapacity" />
                                        </p>
                                        <p>Price / Night: RM <xsl:value-of select="pricePerNight" />
                                        </p>
                                    </div>
                                    <div style="text-align: center; padding: 30px;">
                                        <a href="/RoomDetails/{@id}">More Details</a>
                                    </div>
                                </div>
                            </div>
                        </xsl:for-each>
                    </div>
                </div>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
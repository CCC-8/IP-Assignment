<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" indent="yes"/>

    <xsl:template match="/">
        <html>
            <head>
                <title>Users List</title>
                <style>
                    body {
                    font-family: Arial, sans-serif;
                    background-color: #F5F5F5;
                    }

                    h1 {
                    color: #666;
                    text-align: center;
                    margin-top: 50px;
                    }

                    table {
                    border-collapse: collapse;
                    margin: 0 auto;
                    background-color: #FFF;
                    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
                    }

                    th {
                    background-color: #9acd32;
                    color: #FFF;
                    font-weight: bold;
                    text-align: left;
                    padding: 10px;
                    text-transform: uppercase;
                    font-size: 12px;
                    }

                    td {
                    padding: 10px;
                    border-bottom: 1px solid #E0E0E0;
                    font-size: 14px;
                    text-align: left;
                    }

                    tr:hover {
                    background-color: #F5F5F5;
                    }

                    img {
                    display: block;
                    margin: 0 auto;
                    max-width: 50px;
                    max-height: 50px;
                    }
                </style>
            </head>
            <body>
                <h1>Users List</h1>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                    <xsl:for-each select="users/user">
                        <tr>
                            <td>
                                <xsl:value-of select="userID"/>
                            </td>
                            <td>
                                <xsl:if test="avatar != ''">
                                    <img src="{concat('/storage/avatars/', avatar)}"/>
                                </xsl:if>
                            </td>
                            <td>
                                <xsl:value-of select="username"/>
                            </td>
                            <td>
                                <xsl:value-of select="email"/>
                            </td>
                            <td>
                                <xsl:value-of select="phoneno"/>
                            </td>
                            <td>
                                <xsl:value-of select="address"/>
                            </td>
                            <td>
                                <xsl:value-of select="created_at"/>
                            </td>
                            <td>
                                <xsl:value-of select="updated_at"/>
                            </td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>

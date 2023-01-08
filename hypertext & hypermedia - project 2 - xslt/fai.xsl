<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="2.0">
    <xsl:output method="html" indent="yes" />
    <xsl:template match="/data">
        <html>
            <head>
                <link rel="stylesheet" type="text/css" href="styles.css" />
            </head>
            <body>
                <h1>Project P.F.I - Personal Finance and Investing</h1>

                <xsl:for-each
                    select="images/image">
                    <xsl:sort select="name" data-type="text" order="ascending" />
                    <xsl:number value="position()" format="1. " />
                    <xsl:value-of select="name" />
                    <br />
                    <img src="{url}" alt="{name}" />
                    <br />
                </xsl:for-each>

                <h2>Websites</h2>

                <xsl:for-each
                    select="recommendations/websites/website[@isActive='true']">
                    <xsl:sort select="name" data-type="text" order="ascending" />
                    <a href="{link}">
                        <xsl:value-of select="name" />
                    </a>
                    <br />
                    <xsl:number value="position()" format="1. " />
                    <xsl:value-of select="name" />
                    <br />
                    <xsl:if test="@language='Polish'">
                        <xsl:text>Język: polski</xsl:text>
                        <br />
                    </xsl:if>
                    <xsl:choose>
                        <xsl:when test="@author='Marcin Iwuć'">
                            <xsl:text>Autor: Marcin Iwuć</xsl:text>
                            <br />
                        </xsl:when>
                        <xsl:otherwise>
                            <xsl:text>Inny autor</xsl:text>
                            <br />
                        </xsl:otherwise>
                    </xsl:choose>
                    <br />
                </xsl:for-each>

                <xsl:variable name="total"
                    select="count(recommendations/websites/website[@isActive='true'])" />
                <p> Total amount of active websites: <xsl:value-of select="$total" />
                </p>


                <xsl:variable name="totalActiveWebsites">
                    <xsl:for-each
                        select="recommendations/websites/website[@isActive='true']">
                        <xsl:sort select="name" data-type="text" order="ascending" />
                        <xsl:variable name="websiteName" select="name" />
                        <xsl:variable name="websiteLink" select="link" />
                        <xsl:variable name="websiteLanguage" select="@language" />
                        <xsl:variable name="websiteAuthor" select="@author" />
                        <xsl:variable name="websiteIsActive" select="@isActive" />
                        <website>
                            <name>
                                <xsl:value-of select="$websiteName" />
                            </name>
                            <link>
                                <xsl:value-of select="$websiteLink" />
                            </link>
                            <language>
                                <xsl:value-of select="$websiteLanguage" />
                            </language>
                            <author>
                                <xsl:value-of select="$websiteAuthor" />
                            </author>
                            <isActive>
                                <xsl:value-of select="$websiteIsActive" />
                            </isActive>
                        </website>
                    </xsl:for-each>
                </xsl:variable>

                <h2>Books</h2>
                <xsl:apply-templates select="recommendations/books/book" />

                <h2>Podcasts</h2>
                <xsl:apply-templates select="recommendations/podcasts/podcast" />

                <h2>Types of assets</h2>
                <xsl:apply-templates select="typesOfAssets/type" />

                <h2>Investing rules</h2>
                <xsl:apply-templates select="investingRules/rule" />

                <h2>Questions</h2>
                <xsl:apply-templates select="questions/question" />

                <h2>Inflation table</h2>
                <xsl:apply-templates select="inflationTable" />

                <xsl:variable name="totalPrice"
                    select="sum(inflationTable/record/price)"
                />
                <p> Total price: <xsl:value-of select="$totalPrice" />
                </p>

                <h2>Author info</h2>
                <xsl:apply-templates select="author" />

            </body>
        </html>
    </xsl:template>

    <xsl:template match="book">
        <li>
            <xsl:value-of select="name" />
        </li>
    </xsl:template>

    <xsl:template match="podcast">
        <li>
            <xsl:value-of select="name" />
        </li>
    </xsl:template>

    <xsl:template match="type">
        <li>
            <xsl:value-of select="name" />
            <xsl:value-of select="subtypes/subtype" />
        </li>
    </xsl:template>

    <xsl:template match="rule">
        <li>
            <xsl:value-of select="self::node()" />
        </li>
    </xsl:template>

    <xsl:template match="question">
        <li>
            <b>
                <xsl:value-of select="title" />
            </b>
            <mark>
                <xsl:value-of select="//note" />
            </mark>
            <xsl:value-of select="//content" />
        </li>
    </xsl:template>

    <xsl:template match="inflationTable">
        <table>
            <tr>
                <th>Year</th>
                <th>Price</th>
                <th>Inflation rate</th>
            </tr>
            <xsl:apply-templates select="record" />
        </table>
    </xsl:template>

    <xsl:template match="record">
        <tr>
            <td>
                <xsl:value-of select="year" />
            </td>
            <td>
                <xsl:value-of select="format-number(price, '$###,##0.00')" />
            </td>
            <td>
                <xsl:value-of select="format-number(inflationRate, '###,##0%')" />
            </td>
            <td>
                <xsl:value-of select="translate(cumulativeInflation, ',',
            '.')"
                />
            </td>
        </tr>
    </xsl:template>

    <xsl:template match="author">
        <p>
            <xsl:value-of select="firstName" />
            <xsl:value-of select="lastName" />
        </p>
        <p>
            <xsl:value-of select="email" />
            <br></br>
            <b>
                <xsl:value-of select="phoneNumber" />
            </b>
        </p>

        <xsl:apply-templates select="github" />
        <xsl:apply-templates select="linkedIn" />
    </xsl:template>

    <xsl:template match="github">
        <p>
            <xsl:value-of select="name" />
            <br></br>
        </p>
        <xsl:apply-templates select="link" />
    </xsl:template>

    <xsl:template match="linkedIn">
        <p>
            <xsl:value-of select="name" />
            <br></br>
        </p>
        <xsl:apply-templates select="link" />
    </xsl:template>

    <xsl:template match="link">
        <a href="{.}">
            <xsl:value-of select="." />
        </a>
    </xsl:template>

</xsl:stylesheet>
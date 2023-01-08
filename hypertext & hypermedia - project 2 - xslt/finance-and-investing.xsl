<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="/data">
        <html>
            <body>
                <h1>Project P.F.I - Finance and Investing</h1>

                <h2>Images</h2>
                <xsl:for-each select="images/image">
                    <xsl:variable name="image" select="." />
                    <xsl:variable name="name" select="name" />
                    <xsl:variable name="url" select="url" />

                    <!-- <xsl:if test="contains($url, '.webp')"> -->
                    <p>
                        <xsl:value-of select="$name" />
                        <xsl:text> - </xsl:text>
                        <xsl:value-of select="$url" />
                    </p>
                    <!-- </xsl:if> -->
                </xsl:for-each>

                <h2>Recommendations</h2>
                <div>
                    <h3>Websites</h3>
                    <p>
                        <xsl:value-of select="recommendations/websites/website/name" />
                        <xsl:text> - </xsl:text>

                        <xsl:element name="a">
                            <xsl:attribute name="href">
                                <xsl:value-of
                                    select="recommendations/websites/website/linkalternativeLink" />
                            </xsl:attribute>
                            <xsl:value-of
                                select="recommendations/websites/website/link" />
                        </xsl:element>
                    </p>

                    <p>
                        <xsl:value-of select="recommendations/websites/website[2]/name" />
                        <xsl:text> - </xsl:text>

                        <xsl:element name="a">
                            <xsl:attribute name="href">
                                <xsl:value-of
                                    select="recommendations/websites/website[2]/linkalternativeLink" />
                            </xsl:attribute>
                            <xsl:value-of
                                select="recommendations/websites/website[2]/link" />
                        </xsl:element>
                    </p>
                </div>

                <div>
                    <h3>Books</h3>
                    <p>
                        <xsl:value-of select="recommendations/books/book/name" />
                        <xsl:text> - </xsl:text>

                        <xsl:element name="a">
                            <xsl:attribute name="href">
                                <xsl:value-of
                                    select="recommendations/books/book/linkalternativeLink" />
                            </xsl:attribute>
                            <xsl:value-of
                                select="recommendations/books/book/link" />
                        </xsl:element>
                    </p>

                    <p>
                        <xsl:value-of select="recommendations/books/book[2]/name" />
                        <xsl:text> - </xsl:text>

                        <xsl:element name="a">
                            <xsl:attribute name="href">
                                <xsl:value-of
                                    select="recommendations/books/book[2]/linkalternativeLink" />
                            </xsl:attribute>
                            <xsl:value-of
                                select="recommendations/books/book[2]/link" />
                        </xsl:element>
                    </p>
                </div>

                <div>
                    <h3>Podcasts</h3>
                    <p>
                        <xsl:value-of select="recommendations/podcasts/podcast/name" />
                        <xsl:text> - </xsl:text>

                        <xsl:element name="a">
                            <xsl:attribute name="href">
                                <xsl:value-of
                                    select="recommendations/podcasts/podcast/alternativeLink" />
                            </xsl:attribute>
                            <xsl:value-of
                                select="recommendations/podcasts/podcast/alternativeLink" />
                        </xsl:element>
                    </p>

                    <p>
                        <xsl:value-of select="recommendations/podcasts/podcast[2]/name" />
                        <xsl:text> - </xsl:text>

                        <xsl:element name="a">
                            <xsl:attribute name="href">
                                <xsl:value-of
                                    select="recommendations/podcasts/podcast[2]/alternativeLink" />
                            </xsl:attribute>
                            <xsl:value-of
                                select="recommendations/podcasts/podcast[2]/alternativeLink" />
                        </xsl:element>
                    </p>
                </div>

            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="xml" indent="yes" />

    <xsl:template match="/">
        <root>
            <xsl:apply-templates select="data/recommendations" />
        </root>
    </xsl:template>

    <xsl:template match="recommendations">
        <recommendations-transformed>
            <xsl:for-each select="websites/website">
                <website-transformed>
                    <author>
                        <xsl:value-of select="@author" />
                    </author>
                    <name>
                        <xsl:value-of select="name" />
                    </name>
                    <is-active>
                        <xsl:value-of select="@isActive" />
                    </is-active>
                    <language>
                        <xsl:value-of select="@language" />
                    </language>
                    <link>
                        <xsl:value-of select="link" />
                    </link>
                </website-transformed>
            </xsl:for-each>
        </recommendations-transformed>
    </xsl:template>

    <xsl:template match="data/images">
        <images-transformed>
            <list-of-allowed-extensions>
                <xsl:value-of select="listOfAllowedExtensions" />
            </list-of-allowed-extensions>
            <xsl:for-each select="image">
                <image-transformed>
                    <name>
                        <xsl:value-of select="name" />
                    </name>
                    <url>
                        <xsl:value-of select="url" />
                    </url>
                </image-transformed>
            </xsl:for-each>
        </images-transformed>
    </xsl:template>

    <xsl:template match="data/typesOfAssets">
        <types-of-assets-transformed>
            <xsl:for-each select="type">
                <type-transformed>
                    <xsl:attribute name="name">
                        <xsl:value-of select="name" />
                    </xsl:attribute>
                    <xsl:for-each select="subtypes/subtype">
                        <subtype-transformed>
                            <xsl:value-of select="." />
                        </subtype-transformed>
                    </xsl:for-each>
                </type-transformed>
            </xsl:for-each>
        </types-of-assets-transformed>
    </xsl:template>
</xsl:stylesheet>
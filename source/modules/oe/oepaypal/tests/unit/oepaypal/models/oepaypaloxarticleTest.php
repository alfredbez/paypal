<?php
/**
 * This file is part of OXID eSales PayPal module.
 *
 * OXID eSales PayPal module is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * OXID eSales PayPal module is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OXID eSales PayPal module.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link      http://www.oxid-esales.com
 * @copyright (C) OXID eSales AG 2003-2014
 */

if (!class_exists('oePayPalOxArticle_parent')) {
    class oePayPalOxArticle_parent extends oxArticle
    {
    }
}

/**
 * Testing oxAccessRightException class.
 */
class Unit_oePayPal_models_oePayPalOxArticleTest extends OxidTestCase
{
    /**
     * @dataProvider provider
     */
    public function dataProvider()
    {
        return array(
            array(false, false, false),
            array(true, false, false),
            array(false, true, false),
            array(true, true, true),
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testIsVirtualPayPalArticle($blIsMaterial, $blIsDownloadable, $blResult)
    {
        $oArticle = oxNew("oePayPalOxArticle");

        $oArticle->oxarticles__oxnonmaterial = new oxField($blIsMaterial);
        $oArticle->oxarticles__oxisdownloadable = new oxField($blIsDownloadable);

        $this->assertEquals($blResult, $oArticle->isVirtualPayPalArticle());
    }

    /**
     */
    public function testGetStockAmount()
    {
        $oArticle = oxNew("oePayPalOxArticle");

        $oArticle->oxarticles__oxstock = new oxField(321);

        $this->assertEquals(321, $oArticle->getStockAmount());
    }
}

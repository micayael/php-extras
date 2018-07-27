<?php

namespace Micayael\PHPExtras\Tests;

use Micayael\PHPExtras\Functions\StringFunctions;
use PHPUnit\Framework\TestCase;

/**
 * @author Juan Ardissone (micayael) <micayael@gmail.com>
 */
class StringFunctionsTest extends TestCase
{
    /**
     * @dataProvider getHighlightFormatterTests
     */
    public function testHighlightFormatter($originalText, $highlightText, $expectedText, $highlightClass = 'highlight')
    {
        $this->assertEquals(
            $expectedText,
            StringFunctions::highlight(
                $originalText,
                $highlightText,
                $highlightClass
            )
        );
    }

    public function getHighlightFormatterTests()
    {
        return array(
            array(
                'CONSULTORIA DE APOYO PARA EL FORTALECIMIENTO DE LA DEPSAN, EN LOS SIGUIENTES ESTUDIOS: ADECUANCION de LOS REGLAMENTOS De CALIDAD dE LA PRESTACION DEL SERVICIO Y DE INF. DEL NIVEL DE CONTROLES PARA LOS PERMISIONARIOS DEL SECTOR. CONSULTORIA DE APOYO PARA EL FORTALECIMIENTO DE LA DEPSAN, EN LOS SIGUIENTES ESTUDIOS: ADECUANCION de LOS REGLAMENTOS DE CALIDAD DE la PRESTACION DEL SERVICIO Y DE INF. DEL NIVEL DE CONTROLES PARA LOS PERMISIONARIOS DEL SECTOR.',
                'de',
                'CONSULTORIA <span class="highlight">DE</span> APOYO PARA EL FORTALECIMIENTO <span class="highlight">DE</span> LA DEPSAN, EN LOS SIGUIENTES ESTUDIOS: ADECUANCION <span class="highlight">de</span> LOS REGLAMENTOS <span class="highlight">De</span> CALIDAD <span class="highlight">dE</span> LA PRESTACION DEL SERVICIO Y <span class="highlight">DE</span> INF. DEL NIVEL <span class="highlight">DE</span> CONTROLES PARA LOS PERMISIONARIOS DEL SECTOR. CONSULTORIA <span class="highlight">DE</span> APOYO PARA EL FORTALECIMIENTO <span class="highlight">DE</span> LA DEPSAN, EN LOS SIGUIENTES ESTUDIOS: ADECUANCION <span class="highlight">de</span> LOS REGLAMENTOS <span class="highlight">DE</span> CALIDAD <span class="highlight">DE</span> la PRESTACION DEL SERVICIO Y <span class="highlight">DE</span> INF. DEL NIVEL <span class="highlight">DE</span> CONTROLES PARA LOS PERMISIONARIOS DEL SECTOR.',
            ),
            array(
                'CONSULTORIA DE APOYO PARA EL FORTALECIMIENTO DE LA DEPSAN, EN LOS SIGUIENTES ESTUDIOS: ADECUANCION de LOS REGLAMENTOS De CALIDAD dE LA PRESTACION DEL SERVICIO Y DE INF. DEL NIVEL DE CONTROLES PARA LOS PERMISIONARIOS DEL SECTOR. CONSULTORIA DE APOYO PARA EL FORTALECIMIENTO DE LA DEPSAN, EN LOS SIGUIENTES ESTUDIOS: ADECUANCION de LOS REGLAMENTOS DE CALIDAD DE la PRESTACION DEL SERVICIO Y DE INF. DEL NIVEL DE CONTROLES PARA LOS PERMISIONARIOS DEL SECTOR.',
                array('de', 'consultoria'),
                '<span class="highlight">CONSULTORIA</span> <span class="highlight">DE</span> APOYO PARA EL FORTALECIMIENTO <span class="highlight">DE</span> LA DEPSAN, EN LOS SIGUIENTES ESTUDIOS: ADECUANCION <span class="highlight">de</span> LOS REGLAMENTOS <span class="highlight">De</span> CALIDAD <span class="highlight">dE</span> LA PRESTACION DEL SERVICIO Y <span class="highlight">DE</span> INF. DEL NIVEL <span class="highlight">DE</span> CONTROLES PARA LOS PERMISIONARIOS DEL SECTOR. <span class="highlight">CONSULTORIA</span> <span class="highlight">DE</span> APOYO PARA EL FORTALECIMIENTO <span class="highlight">DE</span> LA DEPSAN, EN LOS SIGUIENTES ESTUDIOS: ADECUANCION <span class="highlight">de</span> LOS REGLAMENTOS <span class="highlight">DE</span> CALIDAD <span class="highlight">DE</span> la PRESTACION DEL SERVICIO Y <span class="highlight">DE</span> INF. DEL NIVEL <span class="highlight">DE</span> CONTROLES PARA LOS PERMISIONARIOS DEL SECTOR.',
            ),
            array(
                'CONSULTORIA DE APOYO PARA EL FORTALECIMIENTO DE LA DEPSAN, EN LOS SIGUIENTES ESTUDIOS: ADECUANCION de LOS REGLAMENTOS De CALIDAD dE LA PRESTACION DEL SERVICIO Y DE INF. DEL NIVEL DE CONTROLES PARA LOS PERMISIONARIOS DEL SECTOR. CONSULTORIA DE APOYO PARA EL FORTALECIMIENTO DE LA DEPSAN, EN LOS SIGUIENTES ESTUDIOS: ADECUANCION de LOS REGLAMENTOS DE CALIDAD DE la PRESTACION DEL SERVICIO Y DE INF. DEL NIVEL DE CONTROLES PARA LOS PERMISIONARIOS DEL SECTOR.',
                array('de', 'consultoria'),
                '<span class="hl">CONSULTORIA</span> <span class="hl">DE</span> APOYO PARA EL FORTALECIMIENTO <span class="hl">DE</span> LA DEPSAN, EN LOS SIGUIENTES ESTUDIOS: ADECUANCION <span class="hl">de</span> LOS REGLAMENTOS <span class="hl">De</span> CALIDAD <span class="hl">dE</span> LA PRESTACION DEL SERVICIO Y <span class="hl">DE</span> INF. DEL NIVEL <span class="hl">DE</span> CONTROLES PARA LOS PERMISIONARIOS DEL SECTOR. <span class="hl">CONSULTORIA</span> <span class="hl">DE</span> APOYO PARA EL FORTALECIMIENTO <span class="hl">DE</span> LA DEPSAN, EN LOS SIGUIENTES ESTUDIOS: ADECUANCION <span class="hl">de</span> LOS REGLAMENTOS <span class="hl">DE</span> CALIDAD <span class="hl">DE</span> la PRESTACION DEL SERVICIO Y <span class="hl">DE</span> INF. DEL NIVEL <span class="hl">DE</span> CONTROLES PARA LOS PERMISIONARIOS DEL SECTOR.',
                'hl'
            ),
        );
    }


    public function testSlugify()
    {
        $string = "O'Reilly -RESTful.Web.Services.pdf";

        $this->assertEquals(StringFunctions::slugify($string), 'o-reilly--restful-web-services-pdf', "original: $string");
    }

    public function testSanitizeFilename()
    {
        $string = "O'Reilly -RESTful.Web.Services.pdf";

        $this->assertEquals(
            StringFunctions::sanitizeFilename($string),
            'O-Reilly--RESTful.Web.Services.pdf',
            "original: $string"
        );
    }

    public function testHideEmail()
    {
        $this->assertEquals(
            StringFunctions::hideEmail('micayael@gmail.com'),
            '&#109;&#105;&#99;&#97;&#121;&#97;&#101;&#108;&#64;&#103;&#109;&#97;&#105;&#108;&#46;&#99;&#111;&#109;'
        );
    }

    public function testHideEmailQuiet()
    {
        $this->assertEquals(
            StringFunctions::hideEmailQuiet('this is not an email'),
            'this is not an email'
        );
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testHideEmailException()
    {
        $this->assertTrue(StringFunctions::hideEmail('this is not an email'));
    }

    public function testStringFormat()
    {
        $this->assertEquals(
            StringFunctions::stringFormat('Hello {name}, this is "{admin.name}"', array(
                    'name' => 'John',
                    'admin' => array('name' => 'Admin Guy'),
                )
            ),
            'Hello John, this is "Admin Guy"'
        );
    }

    public function testFormatUrl()
    {
        $this->assertEquals(
            StringFunctions::formatUrl(
                '/api/documentos/{slug}/clausulas/{identificador}.json',
                array(
                    'slug' => 'este-es-el-slug',
                    'identificador' => 1,
                ),
                array(
                    'id' => 1,
                    'lang' => 'es',
                )
            ),
            '/api/documentos/este-es-el-slug/clausulas/1.json?id=1&lang=es'
        );
    }
}

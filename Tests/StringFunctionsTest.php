<?php

namespace Micayael\PHPExtras\Tests;

use Micayael\PHPExtras\Functions\StringFunctions;

/**
 * @author Juan Ardissone (micayael) <micayael@gmail.com>
 */
class StringFunctionsTest extends \PHPUnit_Framework_TestCase
{
    public function testHighlightFormatter()
    {
        $this->assertEquals(
            StringFunctions::highlight(
                'CONSULTORIA DE APOYO PARA EL FORTALECIMIENTO DE LA DEPSAN, EN LOS SIGUIENTES ESTUDIOS: ADECUANCION de LOS REGLAMENTOS De CALIDAD dE LA PRESTACION DEL SERVICIO Y DE INF. DEL NIVEL DE CONTROLES PARA LOS PERMISIONARIOS DEL SECTOR. CONSULTORIA DE APOYO PARA EL FORTALECIMIENTO DE LA DEPSAN, EN LOS SIGUIENTES ESTUDIOS: ADECUANCION de LOS REGLAMENTOS DE CALIDAD DE la PRESTACION DEL SERVICIO Y DE INF. DEL NIVEL DE CONTROLES PARA LOS PERMISIONARIOS DEL SECTOR.',
                'de'
            ),
            'CONSULTORIA <span class="highlight">DE</span> APOYO PARA EL FORTALECIMIENTO <span class="highlight">DE</span> LA DEPSAN, EN LOS SIGUIENTES ESTUDIOS: ADECUANCION <span class="highlight">de</span> LOS REGLAMENTOS <span class="highlight">De</span> CALIDAD <span class="highlight">dE</span> LA PRESTACION DEL SERVICIO Y <span class="highlight">DE</span> INF. DEL NIVEL <span class="highlight">DE</span> CONTROLES PARA LOS PERMISIONARIOS DEL SECTOR. CONSULTORIA <span class="highlight">DE</span> APOYO PARA EL FORTALECIMIENTO <span class="highlight">DE</span> LA DEPSAN, EN LOS SIGUIENTES ESTUDIOS: ADECUANCION <span class="highlight">de</span> LOS REGLAMENTOS <span class="highlight">DE</span> CALIDAD <span class="highlight">DE</span> la PRESTACION DEL SERVICIO Y <span class="highlight">DE</span> INF. DEL NIVEL <span class="highlight">DE</span> CONTROLES PARA LOS PERMISIONARIOS DEL SECTOR.'
        );

        $this->assertEquals(
            StringFunctions::highlight(
                'CONSULTORIA DE APOYO PARA EL FORTALECIMIENTO DE LA DEPSAN, EN LOS SIGUIENTES ESTUDIOS: ADECUANCION de LOS REGLAMENTOS De CALIDAD dE LA PRESTACION DEL SERVICIO Y DE INF. DEL NIVEL DE CONTROLES PARA LOS PERMISIONARIOS DEL SECTOR. CONSULTORIA DE APOYO PARA EL FORTALECIMIENTO DE LA DEPSAN, EN LOS SIGUIENTES ESTUDIOS: ADECUANCION de LOS REGLAMENTOS DE CALIDAD DE la PRESTACION DEL SERVICIO Y DE INF. DEL NIVEL DE CONTROLES PARA LOS PERMISIONARIOS DEL SECTOR.',
                array('de', 'consultoria')
            ),
            '<span class="highlight">CONSULTORIA</span> <span class="highlight">DE</span> APOYO PARA EL FORTALECIMIENTO <span class="highlight">DE</span> LA DEPSAN, EN LOS SIGUIENTES ESTUDIOS: ADECUANCION <span class="highlight">de</span> LOS REGLAMENTOS <span class="highlight">De</span> CALIDAD <span class="highlight">dE</span> LA PRESTACION DEL SERVICIO Y <span class="highlight">DE</span> INF. DEL NIVEL <span class="highlight">DE</span> CONTROLES PARA LOS PERMISIONARIOS DEL SECTOR. <span class="highlight">CONSULTORIA</span> <span class="highlight">DE</span> APOYO PARA EL FORTALECIMIENTO <span class="highlight">DE</span> LA DEPSAN, EN LOS SIGUIENTES ESTUDIOS: ADECUANCION <span class="highlight">de</span> LOS REGLAMENTOS <span class="highlight">DE</span> CALIDAD <span class="highlight">DE</span> la PRESTACION DEL SERVICIO Y <span class="highlight">DE</span> INF. DEL NIVEL <span class="highlight">DE</span> CONTROLES PARA LOS PERMISIONARIOS DEL SECTOR.'
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
}

<?php

declare(strict_types=1);

$options = [
    [
        'page_title' => 'Homepage',
        'page_slug' => '',
        'is_homepage' => true,
        'page_type' => 'home',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(WWW_ROOT . 'caixa/images/default/home-hero.webp'),
            'popular_location_list' => [
                'location_img' => [
                    'a1' => new \App\Utils\MediaUpload(WWW_ROOT . 'caixa/images/default/home-Barcelona.webp'),
                    'a2' => new \App\Utils\MediaUpload(WWW_ROOT . 'caixa/images/default/home-Bilbao.webp'),
                    'a3' => new \App\Utils\MediaUpload(WWW_ROOT . 'caixa/images/default/home-Granada.webp'),
                    'a4' => new \App\Utils\MediaUpload(WWW_ROOT . 'caixa/images/default/home-Madrid.webp'),
                    'a5' => new \App\Utils\MediaUpload(WWW_ROOT . 'caixa/images/default/home-Malaga.webp'),
                    'a6' => new \App\Utils\MediaUpload(WWW_ROOT . 'caixa/images/default/home-Palma.webp'),
                    'a7' => new \App\Utils\MediaUpload(WWW_ROOT . 'caixa/images/default/home-Sevilla.webp'),
                ],
                'location_title' => [
                    'a1' => 'Barcelona',
                    'a2' => 'Bilbao',
                    'a3' => 'Granada',
                    'a4' => 'Madrid',
                    'a5' => 'Malaga',
                    'a6' => 'Palma',
                    'a7' => 'Sevilla',
                ],
                'location_qobrix_url' => [
                    'a1' => '/',
                    'a2' => '/',
                    'a3' => '/',
                    'a4' => '/',
                    'a5' => '/',
                    'a6' => '/',
                    'a7' => '/',
                ],
            ],
            'user_search_list' => [
                'user_search_list_img' => [
                    'a1' => new \App\Utils\MediaUpload(WWW_ROOT . 'caixa/images/default/home-user-search-1.webp'),
                    'a2' => new \App\Utils\MediaUpload(WWW_ROOT . 'caixa/images/default/home-user-search-2.webp'),
                    'a3' => new \App\Utils\MediaUpload(WWW_ROOT . 'caixa/images/default/home-user-search-3.webp'),
                ],
                'user_search_list_descr' => [
                    'a1' => 'Descubre tu oasis personal con nuestras viviendas que cuentan con terraza o jardín',
                    'a2' => 'Hogares con garaje incluido. La comodidad de un espacio para tu vehículo.',
                    'a3' => 'Viviendas que han reducido su precio. El hogar de tus sueños a un costo increíble.',
                ],
                'user_search_list_qobrix_url' => [
                    'a1' => '/',
                    'a2' => '/',
                    'a3' => '/',
                ],
            ],
            'mortgage_img' => new \App\Utils\MediaUpload(WWW_ROOT . 'caixa/images/default/home-mortgage.webp'),
            'mortgage_title_img' => new \App\Utils\MediaUpload(WWW_ROOT . 'caixa/images/default/home-mortgage-title.webp'),
            'mortgage_services_list' => [
                'mortgage_services_list_title' => [
                    'a1' => 'Tarifa plana',
                    'a2' => 'Se adapta a ti',
                    'a3' => 'Cuota bonificada',
                    'a4' => 'Sin gastos asociados',
                ],
            ],
            'features_list' => [
                'feature_list_img' => [
                    'a1' => new \App\Utils\MediaUpload(WWW_ROOT . 'caixa/images/default/home-feature-1.webp'),
                    'a2' => new \App\Utils\MediaUpload(WWW_ROOT . 'caixa/images/default/home-feature-2.webp'),
                    'a3' => new \App\Utils\MediaUpload(WWW_ROOT . 'caixa/images/default/home-feature-3.webp'),
                ],
                'feature_list_title' => [
                    'a1' => 'Valora tu inmueble en minutos',
                    'a2' => 'Simulador hipoteca con CaixaBank',
                    'a3' => 'Equipa tu vivienda con Facilitea',
                ],
                'feature_list_descr' => [
                    'a1' => 'Obtén una estimación precisa del valor de tu propiedad, basada en datos reales y sin complicaciones.',
                    'a2' => 'Puedes simular la cuota con la calculadora de hipotecas CaixaBank.',
                    'a3' => '¿Ya elegiste tu hogar ideal? Equipa tu hogar con todo lo que necesitas para convertirlo en un espacio acogedor y funcional.',
                ],
                'feature_list_bg_color' => [
                    'a1' => '#E5EBEC',
                    'a2' => '#F2F3FF',
                    'a3' => '#F1F1ED',
                ],
                'feature_list_class_name' => [
                    'a1' => '',
                    'a2' => 'caixa-utm-params mortgage-btn',
                    'a3' => '',
                ],
                'feature_list_url' => [
                    'a1' => 'https://vender.faciliteacasa.com/pnbl/part/es/search',
                    'a2' => 'https://www.caixabank.es/aplnr/hipotecas/simulador/index_es.html?corp:nf-faciliteacasa:nm-solucionhome&origen=faciliteacasa&idApi=na&api=na&refInmueble=na&paramInPrecioVivienda=na&tipoObra=na&provincia=na',
                    'a3' => 'https://www.facilitea.com/pnbl/part/es/hogar-2/?origen=faciliteacasa',
                ],
            ],
        ],
    ],
    [
        'page_title' => 'Properties',
        'page_slug' => 'properties',
        'page_type' => 'properties',
        'options' => [],
    ],
    [
        'page_title' => 'Property',
        'page_slug' => 'property',
        'page_type' => 'property',
        'options' => [
            'mortgage_icon' => new \App\Utils\MediaUpload(WWW_ROOT . 'caixa/images/default/home-feature-2.webp'),
            'information_icon' => new \App\Utils\MediaUpload(WWW_ROOT . 'caixa/images/default/home-feature-3.webp'),
        ],
    ],
    [
        'page_title' => 'Sobre nosotros',
        'page_type' => 'about',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(WWW_ROOT . 'caixa/images/default/about-us-hero.webp'),
            'third_section_bg_img' => new \App\Utils\MediaUpload(WWW_ROOT . 'caixa/images/default/about-us-img-2.webp'),
            'fifth_section_bg_img' => new \App\Utils\MediaUpload(WWW_ROOT . 'caixa/images/default/about-us-img-3.webp'),
            'sixth_section_bg_img' => new \App\Utils\MediaUpload(WWW_ROOT . 'caixa/images/default/about-us-img-4.webp'),
            'solution_list' => [
                'solution_list_title' => [
                    'a1' => '<p>Facilitea</p>',
                    'a2' => '<p><b>Facilitea</b> Coches</p>',
                    'a3' => '<p><b>Facilitea</b> Casas</p>',
                ],
                'solution_list_link' => [
                    'a1' => '',
                    'a2' => '',
                    'a3' => '',
                ],
            ],
            'features_list' => [
                'feature_list_img' => [
                    'a1' => new \App\Utils\MediaUpload(WWW_ROOT . 'caixa/images/default/home-feature-1.webp'),
                    'a2' => new \App\Utils\MediaUpload(WWW_ROOT . 'caixa/images/default/home-feature-2.webp'),
                    'a3' => new \App\Utils\MediaUpload(WWW_ROOT . 'caixa/images/default/home-feature-3.webp'),
                ],
                'feature_list_title' => [
                    'a1' => 'Valora tu inmueble en minutos',
                    'a2' => 'Simulador hipoteca con CaixaBank',
                    'a3' => 'Equipa tu vivienda con Facilitea',
                ],
                'feature_list_descr' => [
                    'a1' => 'Obtén una estimación precisa del valor de tu propiedad, basada en datos reales y sin complicaciones.',
                    'a2' => 'Puedes simular la cuota con la calculadora de hipotecas CaixaBank.',
                    'a3' => '¿Ya elegiste tu hogar ideal? Equipa tu hogar con todo lo que necesitas para convertirlo en un espacio acogedor y funcional.',
                ],
                'feature_list_bg_color' => [
                    'a1' => '#E5EBEC',
                    'a2' => '#F2F3FF',
                    'a3' => '#F1F1ED',
                ],
                'feature_list_class_name' => [
                    'a1' => '',
                    'a2' => 'mortgage-btn',
                    'a3' => '',
                ],
                'feature_list_url' => [
                    'a1' => 'https://vender.faciliteacasa.com/pnbl/part/es/search',
                    'a2' => 'https://www.caixabank.es/aplnr/hipotecas/simulador/index_es.html?corp:nf-portal:nm-landingportal&origen=portal&origenAnterior=portal&idApi=na&api=na&refInmueble=na&paramInPrecioVivienda=na&tipoObra=na&provincia=na',
                    'a3' => 'https://www.facilitea.com/pnbl/part/es/hogar-2/?origen=faciliteacasa',
                ],
            ],
        ],
    ],
    [
        'page_title' => 'Contacto',
        'page_type' => 'contact',
        'options' => [
            'primary_section_icon' => new \App\Utils\MediaUpload(WWW_ROOT . 'caixa/images/default/contact-us-img.webp'),
        ],
    ],
    [
        'page_title' => 'Términos y condiciones de uso de “Facilitea Casa”',
        'page_slug' => 'terminos-y-condiciones',
        'page_type' => 'terms_and_conditions',
        'options' => [
            'primary_section_content' => '<h4>INTRODUCCIÓN. - ¿Qué es “Facilitea Casa” y qué encontrarás en este documento?</h4> <p>“<strong>Facilitea Casa</strong>” es un servicio prestado por Facilitea (nosotros) que te permite localizar inmuebles que están en venta y/o alquiler. Esto significa que podrás acceder a la información sobre estos inmuebles. Si estás interesado en comprar o alquilar alguno de los inmuebles publicados en “Facilitea Casa”, podrás ponerte en contacto con quien vende y/o alquila los inmuebles (que no somos nosotros), para conocer todas las condiciones de venta y/o alquiler y, en su caso, realizar los procesos de negociación y contratación correspondientes.</p> <p>Por otro lado, a través de “Facilitea Casa” podrás acceder al simulador de préstamos hipotecarios de CaixaBank, S.A. (“<strong>CaixaBank</strong>”) y a nuestra herramienta de valoración de inmuebles. Con la herramienta de valoración de inmuebles, podrás hacer un cálculo orientativo no oficial de cuál es el valor de un inmueble de tu propiedad. Además, si estás interesado en vender o alquilar un inmueble de tu propiedad, podrás contactar con profesionales especializados en la venta y en el alquiler de inmuebles para que te proporcionen información sobre los servicios que prestan.</p> <p>En este documento encontrarás los términos y condiciones de uso del servicio “Facilitea Casa”. Es decir, el documento recoge las reglas que aplican en la utilización del servicio “Facilitea Casa”.</p> <h4>PRIMERA. - ¿De quién es el servicio “Facilitea Casa”?</h4> <p>“Facilitea Casa” es un servicio que ofrecemos desde Facilitea, empresa del Grupo CaixaBank: </p> <ul> <li><strong>Facilitea Selectplace, S.A.U.</strong> (“<strong>Facilitea</strong>”), con domicilio en Gran Vía de les Corts Catalanes, 159, pl. 8, 08014 Barcelona, inscrita en el Registro Mercantil de Barcelona, tomo 9373, folio 52, hoja B-50420, inscripción 1ª, CIF A-58481730<strong>.</strong></li> </ul> <h4>SEGUNDA. - ¿Qué hace Facilitea en relación con el servicio “Facilitea Casa”? ¿Qué no hace?</h4> <p>Facilitea es la empresa que proporciona el portal web a través del que se presta el servicio “Facilitea Casa” (<a href="/">https://faciliteacasa.com</a>). Es en este portal donde se publican los inmuebles y, por tanto, el que te permite localizarlos y contactar con los terceros que los venden y/o alquilan. </p> <p>Es importante que conozcas que no somos una agencia inmobiliaria, ni nos dedicamos a vender ni alquilar inmuebles, ni directa ni indirectamente. Es decir, tampoco somos intermediarios de las operaciones de compraventa y alquiler. Desde Facilitea, nos limitamos a permitir la publicación de inmuebles en el portal, a proporcionar el acceso a la información del portal, así como a facilitar que puedas ponerte en contacto con quienes venden y/o alquilan los inmuebles.</p> <p>Además, ponemos a tu disposición el acceso al simulador de préstamos hipotecarios de CaixaBank y a nuestra herramienta de valoración de inmuebles. Sin embargo, nosotros no damos financiación ni intermediamos en la concesión de préstamos hipotecarios. Asimismo, tampoco somos tasadores de inmuebles ni realizamos valoraciones oficiales de inmuebles.</p> <p>Todo lo anterior significa que cualquier servicio distinto de los que te prestamos directamente desde Facilitea, será prestado por un tercero, sin que nosotros tengamos control o participación alguna sobre las condiciones y la prestación de estos servicios. La información sobre los servicios te la facilitarán los terceros que los prestan, con quienes también los contratarás, en su caso.</p> <h4>TERCERA. - ¿Es necesario registrarse para usar el servicio “Facilitea Casa”?</h4> <p>Para acceder a la web de “Facilitea Casa” y consultar los inmuebles que estén publicados en el portal, no es necesario que te registres. Es decir, puedes navegar libremente por la web de “Facilitea Casa”, pero no podrás utilizar las funcionalidades del servicio. Para que tengas claro qué puedes hacer en “Facilitea Casa” sin estar registrado, serán las siguientes acciones:</p> <ul> <li><p>Acceder a nuestro portal y navegar por el mismo</p> </li> <li><p>Buscar y consultar los inmuebles publicados, usando las herramientas disponibles</p> </li> <li><p>Acceder al resto de funcionalidades accesorias</p> </li> </ul> <p>En cualquier caso, el acceso y uso de nuestro portal implica que aceptas estos términos y condiciones, o los que estén vigentes en cada momento para el servicio “Facilitea Casa”.</p> <p><strong>CUARTA. - ¿Qué requisitos necesitas cumplir para registrarte en “Facilitea Casa”?</strong></p> <p>Para poder utilizar todas las funcionalidades de “Facilitea Casa”, sí será necesario que te registres. Podrás registrarte como usuario en “Facilitea Casa” si cumples los siguientes requisitos:</p> <ul> <li><p>Eres una persona física mayor de 18 años. Para registrarte como usuario en “Facilitea Casa”, es obligatorio ser mayo de 18 años. Cuando te registras, declaras y garantizas que cumples con este requisito de edad. En cualquier caso, nos reservamos el derecho de solicitar una verificación de tu edad y de suspender o cancelar tu cuenta en caso de que haya dudas o incumplimientos de la condición de que seas mayor de 18 años.</p> </li> <li><p>La información que proporcionas en el registro es veraz, actualizada y completa. En concreto, los datos sobre tu identidad y otros datos requeridos en el formulario de registro. Eres el único responsable de que esta información se mantenga actualizada. Nos reservamos el derecho a verificar la información proporcionada en cualquier momento. La aceptación del registro queda a discreción de Facilitea, lo que implica que podemos rechazar o cancelar cualquier registro que no cumpla con los requisitos o que, a nuestro criterio, pueda suponer un riesgo para la seguridad del portal de “Facilitea Casa” o, en general, para el buen funcionamiento del servicio “Facilitea Casa”.</p> </li> <li><p>La cuenta de usuario es personal e intransferible. Esto significa que te comprometes a no compartir tus credenciales de acceso con terceros y a proteger la confidencialidad de tu contraseña. Serás responsable de todas las actividades que se hagan desde tu cuenta.</p> </li> <li><p>Al registrarte y utilizar “Facilitea Casa”, te comprometes a cumplir con todas las leyes y normas aplicables, con estos términos y condiciones y con nuestra política de privacidad.</p> </li> </ul> <p>Si cumples los requisitos indicados, podrás darte de alta como usuario del servicio “Facilitea Casa”. Para proceder con el registro, tendrás que seguir estos pasos:</p> <ul> <li><p>Completar el formulario de registro de usuarios disponible en cada momento a través del enlace <a href="https://www.facilitea.com/pnbl/part/es/account/login">https://www.facilitea.com/pnbl/part/es/account/login</a>, o a través de otros canales que se habiliten de manera específica para el registro de usuarios en “Facilitea Casa”.</p> </li> <li><p>Aceptar estos términos y condiciones. El registro como usuario de “Facilitea Casa” implica la aceptación de estos términos y condiciones, y el acceso y uso de nuestro portal implica que aceptas los términos y condiciones que estén vigentes en cada momento. </p> </li> </ul> <h4>QUINTA. - ¿Qué puedes hacer si eres usuario registrado de “Facilitea Casa”?</h4> <p>Si eres usuario registrado de “Facilitea Casa”, además de poder usar las funcionalidades a las que puedes acceder sin estar registrado, podrás utilizar las siguientes funcionalidades:</p> <ul> <li>Guardar inmuebles como favoritos, guardar búsquedas de inmuebles realizadas, activar las notificaciones sobre cambios en los anuncios y contactar con el anunciante (“Solicitar información, “Concertar una visita”, “Quiero que me llamen”, “Dirección exacta”).</li> </ul> <p>Estas funcionalidades concretas pueden cambiar a lo largo de la vida del servicio “Facilitea Casa” y no tendremos que notificarte los cambios. Los cambios pueden significar que: <strong>(i)</strong> algunas funcionalidades no estén disponibles, ya sea temporal o permanentemente; <strong>(ii)</strong> las funcionalidades disponibles para el usuario en cada momento sean distintas.  </p> <h4>SEXTA. - ¿Qué obligaciones tienes que cumplir para utilizar el servicio “Facilitea Casa”?</h4> <p>Para utilizar el servicio de “Facilitea Casa” deberás cumplir una serie de obligaciones:</p> <ul> <li><p>Mantener actualizados tus datos personales y de contacto, si estás registrado.</p> </li> <li><p>Hacer un uso responsable y personal de tu cuenta de usuario y credenciales, quedando expresamente prohibida la cesión o transferencia de estos elementos a terceros.</p> </li> <li><p>Cumplir en todo momento con los términos y condiciones del servicio vigentes.</p> </li> <li><p>No realizar actos u operaciones fraudulentos, irregulares, artificiales o de mala fe para acceder a los servicios o disfrutar de los mismos. Por ejemplo: (i) si te registras como usuario utilizando datos falsos o suplantando la identidad de terceros; (ii) si te registras más de una vez utilizando direcciones de correo electrónico distintas o facilitando dos fechas de nacimiento diferentes; (iii) si utilizas datos personales de otras personas sin su permiso; (iv) si realizas actuaciones dirigidas a extraer información del portal, a impedir el buen funcionamiento de portal y los servidores, o contra su seguridad.</p> </li> <li><p>No copiar o reproducir el contenido del portal sin nuestro permiso.</p> </li> <li><p>No usar nuestras marcas o logotipos.</p> </li> <li><p>No crear enlaces a nuestro contenido sin autorización previa.</p> </li> <li><p>No modificar o alterar nuestros materiales o contenidos. </p> </li> </ul> <p>Si incumples cualquiera de estas obligaciones, perderás automáticamente tu condición de usuario del servicio desde que tengamos conocimiento del incumplimiento. Esto significa que a partir de ese momento no podrás acceder a los servicios, ni tampoco disfrutar de los servicios a los que hubieras podido tener acceso antes, pero que todavía estén activos.</p> <h4>SÉPTIMA. - ¿Tienes que pagar para utilizar el servicio “Facilitea Casa”?</h4> <p>El acceso al servicio “Facilitea Casa” es gratuito, por lo que no tienes que pagar para ser usuario del servicio, ni tampoco para acceder y usar el portal, aunque no seas un usuario registrado. No obstante, para obtener la condición de usuario del servicio (y para usarlo) deberás cumplir todos los requisitos establecidos en los términos y condiciones vigentes del servicio.</p> <p>Es importante que tengas claro que nosotros solo controlamos el precio de nuestros servicios. Es decir, de las funcionalidades que ponemos a tu disposición a través de “Facilitea Casa” y su portal. Sin embargo, no tenemos control alguno sobre los precios ni sobre las condiciones de los servicios que pueden prestarte terceros, por ejemplo, CaixaBank, o los profesionales que están especializados en la comercialización (compraventa y alquiler) de inmuebles.</p> <h4>OCTAVA. - ¿Qué comunicaciones operativas recibirás como usuario del servicio “Facilitea Casa”?</h4> <p>Te enviaremos comunicaciones operativas para gestionar y desarrollar la relación contigo como usuario del servicio, y también para asegurarnos de que el servicio funciona correctamente. Por ejemplo: (i) notificaciones sobre la incorporación de nuevas funcionalidades en el servicio; (ii) comunicaciones y recordatorios sobre los inmuebles que has visitado; (iii) comunicaciones y recordatorios sobre las búsquedas que has realizado; (iv) alertas de seguridad o información necesaria para el uso adecuado del servicio y sus funcionalidades. Para enviarte este tipo de comunicaciones, no necesitamos tu consentimiento previo. En caso de que seas usuario registrado podrás activar y desactivar algunas de estas notificaciones en <a href="/notificaciones">https://faciliteacasa.com/notificaciones</a>.</p> <h4>NOVENA. - ¿Podemos cambiar los términos y condiciones del servicio “Facilitea Casa”?</h4> <p>Sí, es posible que modifiquemos estos términos y condiciones en cualquier momento, incluyendo los requisitos para usuario del servicio y los tipos de funcionalidades asociados al servicio. Los cambios en los términos y condiciones te los notificaremos por email o por otro soporte electrónico. Si la modificación te favorece, la haremos de forma inmediata y te informaremos después. En el resto de los casos te notificaremos el cambio con antelación:</p> <ul> <li><p>En caso de que cancelemos el servicio “Facilitea Casa”, te lo notificaremos, como mínimo, dos (2) meses antes de la fecha de cancelación del servicio. </p> </li> <li><p>En caso de que cambiemos los requisitos para ser usuario del servicio, te lo notificaremos, como mínimo, dos (2) meses antes de la fecha del cambio.</p> </li> <li><p>En caso de que Facilitea, o el tercero a cuyos productos y servicio puedes acceder a través del servicio “Facilitea Casa”, cesen sus operaciones, tendremos que realizar inmediatamente los cambios y te avisaremos en cuanto tengamos conocimiento del cese. En este caso no responderemos del cumplimiento de un plazo de preaviso.</p> </li> </ul> <p>En cualquier caso, puedes decidir darte de baja como usuario del servicio “Facilitea Casa” ante cualquier cambio que hagamos en los términos y condiciones del servicio. </p> <h4>DÉCIMA. - ¿Caduca la condición de usuario del servicio “Facilitea Casa”?</h4> <p>La condición de usuario del servicio “Facilitea Casa” no caduca. Tendrás la condición de usuario del servicio siempre y cuando: <strong>(i)</strong> no solicites la baja voluntaria del servicio; <strong>(ii)</strong> no incumplas los términos y condiciones del servicio vigentes en cada momento; <strong>(iii)</strong> el servicio esté vigente.</p> <h4>DECIMOPRIMERA. - ¿Cuándo y cómo puedes darte de baja del servicio “Facilitea Casa”?</h4> <p>Puedes darte de baja del servicio “Facilitea Casa” cuando quieras. Puedes solicitar la baja del servicio a través del enlace <a href="https://www.facilitea.com/pnbl/part/es/account/dashboard">https://www.facilitea.com/pnbl/part/es/account/dashboard</a> o de los canales que pongamos a tu disposición en cada momento. Con la baja, perderás tu condición de usuario y cualquier servicio activo de “Facilitea Casa”.</p> <h4>DECIMOSEGUNDA. - ¿Quién trata tus datos personales y cómo?</h4> <p>En caso de que accedas a Facilitea Casas y te registres como usuario, Facilitea tratará tus datos personales para gestionar los servicios que solicites. Puedes obtener información detallada del tratamiento de tus datos personales y como ejercer tus derechos consultando nuestra Política de Privacidad. (<a href="/politica-de-privacidad">https://faciliteacasa.com/politica-de-privacidad</a>)</p> <p>En el supuesto de que solicites a través de Facilitea algunos de los servicios de Facilitea Casas, trataremos los datos necesarios (y te informaremos del detalle de estos datos en cada momento), comunicando por parte de Facilitea estos a datos a terceros para la ejecución del servicio que estes solicitando, y serán tratados por dichas empresas o terceros como responsables de los datos, ellos te informarán del tratamiento de los datos personales y su política de privacidad.</p> <p>También te informamos de que podemos utilizar “cookies” cuando navegas por la Web. Puedes obtener información detallada acerca de nuestro uso de “cookies” consultando nuestra Política de Cookies (<a href="/politica-de-cookies">https://faciliteacasa.com/politica-de-cookies</a>).</p> <h4>DECIMOTERCERA. - ¿Cómo puedes contactarnos si tienes dudas o reclamaciones?</h4> <p>Puedes presentar tus consultas y reclamaciones sobre el servicio “Facilitea Casa” ante el servicio de atención al cliente de Facilitea (correo electrónico, teléfono o dirección postal):</p> <ul> <li><a href="mailto:servicio.cliente@facilitea.com">servicio.cliente@facilitea.com</a>   </li> <li>93 102 82 63 – 900 404 202  </li> <li>Gran vía de les Corts Catalanes, 159-163, planta 8, 08028 (Barcelona)</li> </ul> <h4>DECIMOCUARTA. - ¿En qué lenguas están redactados los términos y condiciones?</h4> <p>Los términos y condiciones del servicio podrán estar redactados en castellano, catalán o inglés, según la lengua que elijas para navegar por el sitio web de “Facilitea Casa”.</p> <h4>DECIMOQUINTA. - ¿Cuáles son los tribunales competentes en caso de controversia?</h4> <p>Los juzgados y tribunales competentes son los del domicilio habitual de cada usuario.</p> <h4>CUMPLIMIENTO DEL REGLAMENTO EUROPEO DE SERVICIOS DIGITALES (DSA)</strong></h4> <p>En Facilitea estamos comprometidos con la transparencia, la protección de los derechos de los usuarios y el cumplimiento de todas las regulaciones aplicables, incluido el Reglamento Europeo de Servicios Digitales (DSA). A continuación, encontrarás la información relevante para garantizar el cumplimiento del DSA por parte de Facilitea en relación con el servicio Facilitea Casa.</p> <p><strong>1. Moderación de Contenidos</strong></p> <p><strong>1.1 Criterios y procedimientos</strong></p> <p>No somos responsables de los contenidos que los anunciantes alojan en la web de Facilitea Casa. No obstante, tratamos de moderar este contenido de acuerdo con los siguientes criterios:</p> <ul> <li><p>Prohibición de contenido ilegal, incluyendo, entre otros, productos falsificados, materiales peligrosos y cualquier otro contenido prohibido por la ley.</p> </li> <li><p>Prohibición de usos indebidos de nuestros servicios, incluyendo la comisión de delitos o la realización de actividades ilegales relacionadas con la venta de productos y servicios.</p> </li> <li><p>Evaluación de contenido sospechoso o denunciado por usuarios.</p> </li> </ul> <p><strong>1.2. Notificación a los destinatarios del servicio (anunciantes)</strong></p> <p>Si un contenido es eliminado o bloqueado, el anunciante recibirá una notificación que incluirá:</p> <ul> <li><p>Razones específicas para la eliminación o bloqueo.</p> </li> <li><p>Procedimiento para apelar la decisión, si considera que ha sido un error.</p> </li> </ul> <p><strong>2. Destinatarios activos</strong></p> <p>Tenemos la obligación de facilitarte los datos sobre el volumen promedio mensual de destinatarios activos de Facilitea Casa en la Unión Europea, y haremos el cálculo basándonos en el volumen promedio mensual de los últimos seis meses. Son destinatarios activos del servicio los usuarios que visualizan la información de nuestra interfaz en línea, pero no los que visualizan la información de las interfaces de terceros a las que se acceda desde la web de Facilitea Casa.</p> <p>Esta información la iremos actualizando al menos una vez cada seis meses. Podrás ir consultando aquí la información vigente a cada fecha. </p> <p><strong>3. Procedimientos de quejas y recursos</strong></p> <p><strong>3.1. Sistema de quejas</strong></p> <p>Si el anunciante tiene alguna queja sobre la moderación de contenido o cualquier otro aspecto de nuestro servicio, puede remitir la queja al correo <a href="mailto:servicio.cliente@facilitea.com">servicio.cliente@facilitea.com</a></p> <p><strong>3.2. Proceso de revisión</strong></p> <p>Una vez presentada la queja, nuestro equipo la revisará en un plazo de 15 días hábiles. Notificaremos el resultado de la revisión y los pasos a seguir.</p> <p><strong>4. Medidas contra el contenido ilegal</strong></p> <p><strong>4.1. Reporte de contenidos ilegales</strong></p> <p>Si encuentras contenido ilegal en la web de Facilitea Casa y quieres reportarlo, puedes hacerlo a través del envío de un correo electrónico a la siguiente dirección: <a href="mailto:servicio.cliente@facilitea.com">servicio.cliente@facilitea.com</a>.</p> <p><strong>4.2. Cooperación con autoridades competentes</strong></p> <p>Colaboramos plenamente con las autoridades competentes para identificar y eliminar contenido ilegal de nuestro Sitio Web.</p> <p><strong>5. Publicidad</strong></p> <p>Todos los contenidos publicitarios están claramente señalados para que puedas diferenciarlos de otros tipos de contenido.</p> <p><strong>6. Punto de contacto para el cumplimiento del Reglamento de Servicios Digitales</strong></p> <p>Proporcionamos un punto de contacto específico para facilitar la comunicación con autoridades competentes, usuarios y otras partes interesadas.</p> <p><strong>6.1. Información del Punto de Contacto</strong></p> <p>Para todo tipo de comunicación directa respecto a la aplicación y cumplimiento del DSA, por vía electrónica, con las <strong>autoridades</strong> de los Estados miembros, con la Comisión europea y con la Junta Europea de Servicios Digitales, así como con los <strong>destinatarios del servicio</strong>, podrás hacerlo a través de los siguientes canales establecidos como Punto de Contacto:</p> <ul> <li><strong>Correo Electrónico</strong>: <a href="mailto:servicio.cliente@facilitea.com">servicio.cliente@facilitea.com</a> </li> </ul> <p>El castellano y el inglés son las lenguas que puedan utilizarse en las comunicaciones con el Punto de Contacto.</p> <p><strong>7. Transparencia en el cumplimiento del Reglamento de Servicios Digitales</strong></p> <p>Publicaremos informes periódicos sobre la moderación de contenidos y la aplicación del DSA al servicio de Facilitea Casa. Además, nos comprometemos a garantizar la transparencia en los sistemas de recomendación y clasificación de contenidos de Facilitea Casa.</p> <p>Puedes consultar aquí los distintos informes de transparencia que publiquemos. </p>',
        ],
    ],
    [
        'page_title' => 'Aviso Legal',
        'page_slug' => 'aviso-legal',
        'page_type' => 'legal_notice',
        'options' => [
            'primary_section_content' => '<h4>Aviso legal del portal web</h4><p>Facilitea Selectplace, S.A.U. (en adelante Facilitea) es la entidad titular del website al que usted ha accedido.El acceso al website de Facilitea y a la información relativa a cualesquiera de los productos y servicios contenidos en el mismo comporta la aceptación de las condiciones generales previstas en el presente Aviso Legal. Por ello deberá leer atentamente su contenido si usted desea acceder y hacer uso de la información y los servicios ofrecidos en el website de Facilitea.</p><p><br></p><h4>Validez de la información</h4><p>La información contenida en estas páginas es la vigente en la fecha de su última actualización.</p><p>Las presentes condiciones son las vigentes desde la fecha de su última actualización. Facilitea se reserva el derecho a modificarlas en cualquier momento, en cuyo caso entrarán en vigor desde su publicación y serán aplicables a todos los usuarios del websites desde esa fecha.</p><p>Los contenidos de cualquiera de las páginas web, en especial las referencias informativas y publicitarias, salvo que expresamente se indique lo contrario, no constituyen oferta vinculante. Facilitea se reserva el derecho a introducir modificaciones u omitir parcial o totalmente los actuales contenidos cuando lo considere oportuno, así como impedir o restringir el acceso de forma temporal o permanente.</p><p>Facilitea podrá incluir en su website contenidos de terceros y enlaces a páginas web de terceros, siempre con la autorización de sus titulares, tales como a redes sociales y a otras informaciones. En ninguno de esos casos Facilitea será responsable de las páginas y contenidos de terceros, así como del funcionamiento y disponibilidad de los mismos.</p><p><br></p><h4>Navegación y personalización</h4><p>La simple navegación a través del website de Facilitea tiene carácter gratuito y tampoco exige el registro previo del usuario. No obstante, el acceso, contratación o la utilización de algunos productos o servicios podrá requerir que el usuario se registre. En dicho caso, cada uno de dichos productos y servicios se regirá por sus propias condiciones específicas, sin perjuicio de las condiciones aquí previstas.</p><p><br></p><h4>Seguridad</h4><p>El website de Facilitea está provisto de los certificados, sellos o acreditaciones de seguridad y calidad necesarios para ofrecer un entorno seguro a los usuarios.</p><p><br></p><h4>Política de privacidad y protección de datos</h4><p>CaixaBank cumple íntegramente con la legislación vigente en materia de protección de datos de carácter personal y con los compromisos de confidencialidad propios de la actividad bancaria.</p><p>CaixaBank ha adoptado las medidas técnicas necesarias para mantener el nivel de seguridad requerido, según la naturaleza de los datos personales tratados y las circunstancias del tratamiento, con el objeto de evitar, en la medida de lo posible y siempre según el estado de la técnica, su alteración, pérdida, tratamiento o acceso no autorizado.</p><p>Cuando sea solicitada la cumplimentación de un formulario en el que se recojan datos de carácter personal, se informará al cliente o usuario de acuerdo con lo que en cada momento requiera la normativa de protección de datos y, en el supuesto que sea necesario recabar su consentimiento, lo haremos con los requisitos indicados en la mencionada normativa.</p><p>En todo caso, la información en relación al tratamiento de datos de sus clientes que realiza Caixabank, está siempre disponible en (www.caixabank.com/politicaprivacidad).</p><p>Para que la información que tratamos esté siempre actualizada y no contenga errores pedimos a nuestros clientes y usuarios que nos comuniquen, a la mayor brevedad posible, las modificaciones y rectificaciones de sus datos de carácter personal.</p><p><br></p><h4>Política de cookies</h4><p>Las páginas web de Facilitea disponen de cookies, que son pequeños ficheros de datos que se almacenan en el ordenador del usuario o cliente y que pueden permitir a nuestros sistemas recordar características o preferencias de la navegación en nuestras páginas web que puedan servir para personalizar su acceso en sucesivas visitas, hacer más segura la navegación, recabar información estadística sobre la navegación efectuada, o conocer preferencias de usuarios.La política de cookies de Facilitea se sujeta a la normativa comunitaria y española en vigor, relativa al tratamiento de los datos personales y a la protección de la intimidad en el sector de las comunicaciones electrónicas. En virtud de la misma, Facilitea le informará de las cookies que utiliza en cada uno de sus sitios web (“Información acerca de las cookies utilizadas”) y, cuando sea preciso, solicitará su consentimiento para poder utilizarlas.</p><p><br></p><h4>Portales móviles y geolocalización</h4><p>Algunas de las páginas web de Facilitea están adaptadas para su uso en dispositivos móviles, por lo que es posible que la presentación y el contenido de las diferentes aplicaciones móviles no coincidan ni sean exactos a los del website.</p><p><br></p><h4>Propiedad intelectual e industrial</h4><p>Las páginas web de Facilitea, las páginas que comprende y la información o elementos contenidos en las mismas, incluyen textos, documentos, fotografías, dibujos, representaciones gráficas, bases de datos, programas informáticos, así como logotipos, marcas, nombres comerciales, u otros signos distintivos, protegidos por derechos de propiedad intelectual o industrial, de los que Facilitea o las empresas de su Grupo son titulares o legítimas licenciatarias.</p><p>Facilitea no otorga garantía alguna sobre la licitud y legalidad de la información o elementos contenidos en las páginas web de Facilitea en caso de que la titularidad de los mismos no corresponda a Facilitea ni a las empresas de su Grupo.</p><p><br></p><h4>Usos prohibidos y permitidos</h4><p>Queda prohibida cualquier modalidad de explotación, incluyendo todo tipo de reproducción, distribución, cesión a terceros, comunicación pública y transformación, mediante cualquier tipo de soporte y medio de las obras antes referidas, creaciones y signos distintivos sin autorización previa y expresa de sus respectivos titulares. El incumplimiento de esta prohibición podrá constituir infracción sancionable por la legislación vigente.</p><p>No obstante, por su cuenta y riesgo, el usuario podrá descargar o realizar copia de tales elementos exclusivamente para su uso personal, siempre que no infrinja ninguno de los derechos de propiedad intelectual o industrial de Facilitea. En especial, no podrá alterarlos, modificarlos o suprimirlos ni total ni parcialmente. En ningún caso, ello significará una autorización o licencia sobre los derechos de propiedad de CaixaBank o de las empresas de su Grupo.</p><p>Queda prohibido, salvo en los casos en que expresamente lo autorice Facilitea, establecer enlaces, hipervínculos o links, desde portales o sitios web de terceros a páginas web de distintas de la página principal de su portal, así como presentar las páginas web de CaixaBank o la información contenida en ellas bajo frames o marcos, signos distintivos, marcas o denominaciones sociales o comerciales de otra persona, empresa o entidad.</p><p><br></p><h4>Responsabilidades</h4><p>CaixaBank no garantiza el acceso continuado, ni la correcta visualización, descarga o utilidad de los elementos e información contenidos en las páginas web de Facilitea, que pueden verse impedidos, dificultados o interrumpidos por factores o circunstancias fuera de su control.</p><p>Facilitea no es responsable de la información y demás contenidos integrados en espacios o páginas web de terceros accesibles desde las páginas web de Facilitea mediante enlaces, hipervínculos o links, ni de la información y demás contenidos integrados en espacios o páginas web de terceros desde los que se acceda mediante enlaces, hipervínculos o links al portal de Facilitea o a cualquiera de sus páginas web, ni de la información y contenidos de cualquier página web de terceros que se presente bajo la apariencia o signos distintivos de Facilitea, salvo autorización expresa de esta última.</p><p>Facilitea y sus proveedores de información como terceras partes no asumen responsabilidad alguna con relación a la información, contenidos de todo tipo, productos y servicios ofertados o prestados a través de las páginas web de Facilitea por terceras personas o entidades, aunque pertenezcan a su mismo Grupo económico, y, en especial, por los daños y perjuicios de cualquier tipo que, vinculados a lo anterior, puedan producirse por: (i) ausencia o deficiencias en la información facilitada a los usuarios o en su veracidad, exactitud y suficiencia; (ii) incumplimiento o cumplimiento defectuoso o impuntual de los contratos o relaciones precontractuales; (iii) incumplimiento de las obligaciones que incumben a los prestadores de servicios de la sociedad de la información; (iv) infracción de los derechos de los consumidores y usuarios; (v) infracción de los derechos de propiedad intelectual e industrial; realización de actos de competencia desleal o de publicidad ilícita; (vi) infracción del derecho de protección de datos; del secreto profesional y de los derechos al honor, a la intimidad personal y familiar y a la imagen de las personas; (vii) en general, el incumplimiento de cualesquiera leyes, costumbres o códigos de conducta que resulten de aplicación y (viii) cualquier decisión tomada en dependencia de la información suministrada a través del website de Facilitea.</p><p>Ni Facilitea ni los proveedores de información como terceras partes asumen responsabilidad alguna por daños, perjuicios, pérdidas, reclamaciones o gastos, producidos por: (i) interferencias, interrupciones, fallos, omisiones, averías telefónicas, retrasos, bloqueos o desconexiones en el funcionamiento del sistema electrónico, motivadas por deficiencias, sobrecargas y errores en las líneas y redes de telecomunicaciones, o por cualquier otra causa ajena al control de Facilitea; (ii) intromisiones ilegítimas mediante el uso de programas malignos de cualquier tipo y a través de cualquier medio de comunicación, tales como virus informáticos o cualesquiera otros; (iii) uso indebido o inadecuado de las páginas web de Facilitea; (iv) errores de seguridad o navegación producidos por un mal funcionamiento del navegador o por el uso de versiones no actualizadas del mismo</p><p><br></p><h4>Legislación aplicable</h4><p>Las presentes condiciones generales se regirán por la legislación española.</p>',
        ],
    ],
    [
        'page_title' => 'Política de privacidad',
        'page_type' => 'privacy_policy',
        'options' => [],
    ],
    [
        'page_title' => 'Política de cookies',
        'page_type' => 'cookie_policy',
        'options' => [],
    ],
    [
        'page_title' => 'Cómo Funciona',
        'page_type' => 'how_it_works',
        'options' => [
            'hero_image' => new \App\Utils\MediaUpload(WWW_ROOT . 'caixa/images/default/how-it-works-hero.webp'),
            'forth_section_bg_img' => new \App\Utils\MediaUpload(WWW_ROOT . 'caixa/images/default/about-us-img-3.webp'),
            'contact_us_bg_img' => new \App\Utils\MediaUpload(WWW_ROOT . 'caixa/images/default/about-us-img-4.webp'),
            'solution_list' => [
                'solution_list_title' => [
                    'a1' => '<p>Facilitea</p>',
                    'a2' => '<p><b>Facilitea</b> Coches</p>',
                    'a3' => '<p><b>Facilitea</b> Casas</p>',
                ],
                'solution_list_link' => [
                    'a1' => '',
                    'a2' => '',
                    'a3' => '',
                ],
            ],
            'services_list' => [
                'services_list_img' => [
                    'a1' => new \App\Utils\MediaUpload(WWW_ROOT . 'caixa/images/default/how-it-works-service-1.webp'),
                    'a2' => new \App\Utils\MediaUpload(WWW_ROOT . 'caixa/images/default/how-it-works-service-2.webp'),
                    'a3' => new \App\Utils\MediaUpload(WWW_ROOT . 'caixa/images/default/how-it-works-service-3.webp'),
                    'a4' => new \App\Utils\MediaUpload(WWW_ROOT . 'caixa/images/default/how-it-works-service-4.webp'),
                    'a5' => new \App\Utils\MediaUpload(WWW_ROOT . 'caixa/images/default/how-it-works-service-5.webp'),
                ],
                'services_list_title' => [
                    'a1' => 'Filtra tus búsquedas según  tus necesidades',
                    'a2' => 'Descubre si han bajado de precio ',
                    'a3' => 'Calcula tu hipoteca con Caixabank',
                    'a4' => 'Guarda tus favoritos y Recibe alertas',
                    'a5' => 'Equipa tu vivienda con Facilitea',
                ],
                'services_list_descr' => [
                    'a1' => '',
                    'a2' => '',
                    'a3' => '<p>Lo hacemos fácil para tí con una hipoteca CaixaBank, asegurando las mejores condiciones y asesoramiento financiero.</p>',
                    'a4' => '',
                    'a5' => '',
                ],
                'services_list_bg_color' => [
                    'a1' => '#F1F1ED',
                    'a2' => '#F1F1ED',
                    'a3' => '#F2F3FF',
                    'a4' => '#F1F1ED',
                    'a5' => '#F1F1ED',
                ],
                'services_list_btn_lbl' => [
                    'a1' => '',
                    'a2' => '',
                    'a3' => 'Calcular',
                    'a4' => '',
                    'a5' => '',
                ],
                'services_list_btn_class_name' => [
                    'a1' => '',
                    'a2' => '',
                    'a3' => 'mortgage-btn',
                    'a4' => '',
                    'a5' => '',
                ],
                'services_list_btn_link' => [
                    'a1' => '',
                    'a2' => '',
                    'a3' => '',
                    'a4' => '',
                    'a5' => '',
                ],
            ],
        ],
    ],
    [
        'page_title' => 'Favoritos',
        'page_type' => 'wishlist',
        'options' => [],
    ],
    [
        'page_title' => 'Contact us Form',
        'page_type' => 'components/contact-us-form',
        'options' => [],
    ],
    [
        'page_title' => 'Búsquedas guardadas',
        'page_type' => 'saved_searches',
        'options' => [
            'sub_title' => 'Todas tus búsquedas guardadas',
        ],
    ],
    [
        'page_title' => 'Modals',
        'page_type' => 'components/modals',
        'options' => [],
    ],
    [
        'page_title' => 'Imagin Details',
        'page_type' => 'components/imagin',
        'options' => [],
    ],
    [
        'page_title' => 'Polygon Seacrh Details',
        'page_type' => 'components/polygonsearch',
        'options' => [],
    ],
    [
        'page_title' => 'Notificaciones',
        'page_type' => 'notifications',
        'options' => [],
    ],
    [
        'page_title' => 'Declaracion accesibilidad',
        'page_type' => 'custom_html',
        'options' => [
            'primary_section_content' => '<h1>¿Qué es la accesibilidad para Grupo CaixaBank?</h1><p><br></p><p>Consulta toda la información sobre el compromiso del Grupo CaixaBank en su <a href="https://www.caixabank.es/particular/accesibilidad_es.html" target="_blank">sitio de accesibilidad</a>.</p><p><br></p><h2>Declaración de Accesibilidad&ZeroWidthSpace;</h2><p><br></p><p>En Facilitea, queremos que nuestro sitio web sea accesible para todas las personas, incluidas aquellas con discapacidades. Trabajamos para cumplir con las normas de accesibilidad para el contenido web (WCAG) 2.2 nivel AA, establecidas por el World Wide Web Consortium (W3C).&ZeroWidthSpace;</p><p><br></p><h2>Nuestro Compromiso&ZeroWidthSpace;</h2><p><br></p><p>Queremos ofrecer una experiencia digital inclusiva y accesible. Para lograrlo, estamos trabajando en poder mejorar progresivamente la accesibilidad de esta página con el objetivo de poder dar cumplimiento a todos los requisitos que se detallan en el nivel AA de la WCAG 2.2..</p><p><br></p><p>La presente declaración fue preparada el 20 de junio de 2025.</p><p><br></p><p>El método empleado para preparar la declaración ha sido una autoevaluación.</p><p><br></p><p>Última revisión de la declaración: 20 de junio de 2025.</p><p><br></p>',
        ],
    ],
];

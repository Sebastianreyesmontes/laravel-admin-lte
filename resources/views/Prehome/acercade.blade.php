@extends('Prehome.plantilla-prehome')

@section('content')
    <div class="container-title">
        <div class="text-container">
            <h1>Acerca de Aerocali</h1>
        </div>
    </div>

    <div id="acercade" class="container">
        <div class="row">

            <div class="mision">
                <h3 class="title-p">Misión</h3>
                <p class="parrafo">AEROCALI S.A. es una sociedad desarrolladora y administradora de servicios
                    aeroportuarios e infraestructura sostenible, que garantiza la operación eficiente y segura del
                    Aeropuerto Internacional Alfonso Bonilla Aragón, contribuyendo a la competitividad y conectividad de
                    la región y del país, soportada en capital humano competente, tecnología de vanguardia, cumplimiento
                    de estándares internacionales y amplia trayectoria en el sector, generando bienestar, desarrollo
                    profesional, social y económico para los colaboradores, así como valor para los socios.</p>
            </div>

            <div class="vision">
                <h3 class="title-p">Visión</h3>
                <p class="parrafo">AEROCALI S.A., en el año 2023 será una sociedad que promueva, desarrolle y contribuya
                    con el desarrollo de una infraestructura aeroportuaria sostenible y funcional para los usuarios y la
                    comunidad; preparada para enfrentar los retos y oportunidades del sector, siendo reconocida por su
                    modelo de gestión y liderazgo en la calidad de los servicios que ofrece.</p>
            </div>

            <div class="valo">
                <h3 class="title-p">Valores Corporativos</h3>
                <p class="parrafo-l">
                <ul class="parrafo-puntos">
                    <li>Honestidad</li>
                    <li>Compromiso</li>
                    <li>Innovación</li>
                    <li>Liderazgo</li>
                    <li>Lealtad</li>
                    <li>Trabajo en equipo</li>
                    <li>Responsabilidad</li>
                </ul>
                </p>
            </div>

            <div class="politica-de-calidad">
                <h3 class="title-p">Política de Calidad</h3>
                <p class="parrafo">AEROCALI S.A. está comprometida en garantizar el desarrollo de infraestructura
                    sostenible y la prestación de servicios aeroportuarios de una manera confiable, segura, innovadora,
                    oportuna y continua para satisfacer las necesidades y expectativas de sus clientes y partes
                    interesadas, así como mejorar la experiencia de los usuarios, con personal competente, instalaciones
                    modernas, cumpliendo estándares internacionales y desarrollando procesos de calidad orientados a la
                    mejora continua.</p>
            </div>

            <div class="politica1">
                <h3 class="title-p">Política Anticorrupción de Aerocali S.A.</h3>
                <div>
                    <h5 class="title-p2">OBJETIVOS GENERALES</h5>
                    <p class="parrafo-l">Dar a conocer la política de AEROCALI S.A. (en adelante, la “Sociedad”) en
                        materia de prevención y gestión de eventos de corrupción.</p>
                </div>
                <div>
                    <h5 class="title-p2">OBJETIVOS ESPECÍFICOS</h5>
                    <p class="parrafo-l">
                    <ul class="parrafo-puntos">
                        <li>Promover una cultura ética, encaminada a mitigar los riesgos por corrupción y en
                            relacionamiento con terceros.</li>
                        <li>Brindar directrices para prevenir, detectar, investigar y remediar de manera efectiva y
                            oportuna los eventos de corrupción.</li>
                        <li>Aplicar, en las relaciones entre la Sociedad y sus Colaboradores y con cualquier Funcionario
                            Público o de la Administración Pública (conforme se definen en el GLOSARIO posterior), así
                            como en los tratos con terceros particulares, los principios de respeto, objetividad,
                            transparencia y honestidad.</li>
                    </ul>
                    <p class="parrafo-l">
                        Conoce el documento completo en el siguiente enlace: <a
                            href="https://bit.ly/3ljb0Jq">https://bit.ly/3ljb0Jq</a></p>
                    </p>
                </div>

            </div>

            <div class="politica2">
                <h3 class="title-p">Política de Prevención del Lavado de Activos y Financiación del Terrorismo</h3>
                <p class="parrafo-l">
                    El riesgo de Lavado de Activos y Financiación del Terrorismo es la posibilidad de pérdida o daño que
                    puede sufrir una compañía al poder ser utilizada por organizaciones criminales, directamente o a
                    través de sus operaciones, como instrumento para la materialización de actividades ilegales.
                </p>
                <p class="parrafo-l">
                    Por lo anterior AEROCALI S.A. cuenta con medidas preventivas para mitigar los riesgos de Lavado de
                    Activos y Financiación del Terrorismo, que comprende las etapas de identificación, medición,
                    evaluación, control y monitoreo; este proceso está conformado por políticas y procedimientos que
                    hacen parte de los lineamientos estratégicos de la Compañía, generando un compromiso por parte de
                    todos nuestros colaboradores directos e indirectos, así como de los órganos de administración y
                    accionistas de la sociedad.
                </p>

                <p class="parrafo-l">
                    Conoce el documento completo en el siguiente enlace: <a
                        href="https://bit.ly/3v2zgVh">https://bit.ly/3v2zgVh</a>
                </p>
            </div>

            <div class="row justify-content-center">
                <div class="organigrama-total text-center">
                    <h3 class="title-p">Organigrama</h3>
                    <a href="#!" data-toggle="modal" data-target="#modalImg1">
                        <img src="imgs/organigrama.png" />
                    </a>
                    <a href="#!" data-toggle="modal" data-target="#modalImg2">
                        <img src="imgs/organigrama2.png" />
                    </a>
                </div>
            </div>

            <div tabindex="-1" aria-labelledby="modalImg1" aria-hidden="true" class="modal fade" id="modalImg1">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <img src="imgs/organigrama.png" class="rounded">
                    </div>
                </div>
            </div>

            <div tabindex="-1" aria-labelledby="modalImg2" aria-hidden="true" class="modal fade" id="modalImg2">
                <div class="modal-dialog modal-xl modal-dialog-centered modal-fullscreen-xl">
                    <div class="modal-content">
                        <img src="imgs/organigrama2.png" class="rounded">
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endsection

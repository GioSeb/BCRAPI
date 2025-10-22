@extends('ilustrativo/layouts.app')
@section('title', 'Informe Detallado')

@section('content')

    <!-- ======= Header ======= -->
    <header id="header" class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 bg-transparent">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <h1 class="text-3xl font-bold text-white"><a href=#>NEXOR</a></h1>
                <nav class="hidden lg:flex items-center">
                    <ul class="flex items-center space-x-6">
                        <li><a class="text-white hover:text-blue-400 transition" href="#intro">Inicio</a></li>
                        <li><a class="text-white hover:text-blue-400 transition" href="#services">Servicios</a></li>
                        <li><a class="text-white hover:text-blue-400 transition" href="#about">Sobre nosotros</a></li>
                        <li><a class="text-white hover:text-blue-400 transition" href="#contact">Contacto</a></li>
                        <li><span class="border-l border-gray-400 h-6 mx-2"></span></li>
                        <li><a class="text-white hover:text-blue-400 transition" href="{{-- {{ route('illustrative') }} --}}" target="_blank">Ilustrativo</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- ======= Intro Section ======= -->
    <section id="intro">
        <div x-data="{ activeSlide: 0, slides: 4 }" class="relative w-full h-full">
            <!-- Carousel Items -->
            <div class="w-full h-full">
                <div x-show="activeSlide === 0" class="carousel-item absolute inset-0 transition-opacity duration-1000 ease-in-out" style="background-image: url('{{ asset('img/ilustrativo/1.jpg') }}')">
                    <div class="absolute inset-0 bg-black opacity-50"></div>
                    <div class="relative h-full flex items-center justify-center text-center text-white">
                        <div class="container">
                            <h2 class="text-4xl md:text-5xl font-bold mb-4">MENOR RIESGO DE CRÉDITO</h2>
                            <h4 class="text-xl md:text-2xl mb-8">Información comercial exclusiva. Central de proveedores. Comunidad informativa.</h4>
                            <a href="#featured-services" class="inline-block bg-blue-500 text-white font-bold py-3 px-8 rounded-full hover:bg-blue-600 transition">Sea parte</a>
                        </div>
                    </div>
                </div>
                <div x-show="activeSlide === 1" class="carousel-item absolute inset-0 transition-opacity duration-1000 ease-in-out" style="background-image: url('{{ asset('img/ilustrativo/5.jpg') }}')">
                     <div class="absolute inset-0 bg-black opacity-50"></div>
                    <div class="relative h-full flex items-center justify-center text-center text-white">
                        <div class="container">
                            <h2 class="text-4xl md:text-5xl font-bold mb-4">30 días de acceso <i>sin cargo</i></h2>
                            <h4 class="text-xl md:text-2xl mb-8">Sin compromiso de compra, y con asesoramiento en línea.</h4>
                            <a href="#featured-services" class="inline-block bg-blue-500 text-white font-bold py-3 px-8 rounded-full hover:bg-blue-600 transition">Ingrese</a>
                        </div>
                    </div>
                </div>
                <div x-show="activeSlide === 2" class="carousel-item absolute inset-0 transition-opacity duration-1000 ease-in-out" style="background-image: url('{{ asset('img/ilustrativo/2.jpg') }}')">
                     <div class="absolute inset-0 bg-black opacity-50"></div>
                    <div class="relative h-full flex items-center justify-center text-center text-white">
                        <div class="container">
                            <h2 class="text-4xl md:text-5xl font-bold mb-4">43 años de experiencia</h2>
                            <p class="text-xl md:text-2xl mb-8">Lo invitamos a que nos conozca.</p>
                            <a href="#featured-services" class="inline-block bg-blue-500 text-white font-bold py-3 px-8 rounded-full hover:bg-blue-600 transition">Nuestro historial</a>
                        </div>
                    </div>
                </div>
                <div x-show="activeSlide === 3" class="carousel-item absolute inset-0 transition-opacity duration-1000 ease-in-out" style="background-image: url('{{ asset('img/ilustrativo/3.jpg') }}')">
                     <div class="absolute inset-0 bg-black opacity-50"></div>
                    <div class="relative h-full flex items-center justify-center text-center text-white">
                        <div class="container">
                            <h2 class="text-4xl md:text-5xl font-bold mb-4">Generación de usuarios</h2>
                            <h3 class="text-xl md:text-2xl mb-4">Creación de comunidad de proveedores (servicio exclusivo)</h3>
                            <p class="text-lg mb-8">Puede habilitar el uso independiente del servicio a terceros (otros proveedores y a departamentos internos de su empresa)</p>
                            <a href="#featured-services" class="inline-block bg-blue-500 text-white font-bold py-3 px-8 rounded-full hover:bg-blue-600 transition">Más información</a>
                        </div>
                    </div>
                </div>
                {{-- <div x-show="activeSlide === 4" class="carousel-item absolute inset-0 transition-opacity duration-1000 ease-in-out" style="background-image: url('{{ asset('img/intro-carousel/4.jpg') }}')">
                     <div class="absolute inset-0 bg-black opacity-50"></div>
                    <div class="relative h-full flex items-center justify-center text-center text-white">
                        <div class="container">
                            <h2 class="text-4xl md:text-5xl font-bold mb-4">Comunidad Nexor</h2>
                            <p class="text-lg mb-8">Tenga acceso a nuestra comunidad exclusiva, en la que podrá acceder al comportamiento de pago de otros proveedores, adicionar información, y mucho más.</p>
                            <a href="#featured-services" class="inline-block bg-blue-500 text-white font-bold py-3 px-8 rounded-full hover:bg-blue-600 transition">Encuentre sus beneficios</a>
                        </div>
                    </div>
                </div> --}}
            </div>

            <!-- Controls -->
            <button @click="activeSlide = (activeSlide - 1 + slides) % slides" class="absolute left-0 top-1/2 transform -translate-y-1/2 p-4 text-white text-3xl"><i class="fas fa-chevron-left"></i></button>
            <button @click="activeSlide = (activeSlide + 1) % slides" class="absolute right-0 top-1/2 transform -translate-y-1/2 p-4 text-white text-3xl"><i class="fas fa-chevron-right"></i></button>

            <!-- Indicators -->
            <div class="absolute bottom-5 left-1/2 transform -translate-x-1/2 flex space-x-2">
                <template x-for="i in slides" :key="i">
                    <button @click="activeSlide = i - 1" :class="{'bg-white': activeSlide === i - 1, 'bg-gray-400': activeSlide !== i - 1}" class="w-3 h-3 rounded-full"></button>
                </template>
            </div>
        </div>
    </section>

    <main id="main">

        <!-- ======= Featured Services Section ======= -->
        <section id="featured-services" class="py-16">
            <div class="container mx-auto px-4">
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="text-center p-6 shadow-lg rounded-lg bg-blue-500 text-white">
                        <i class="fas fa-file text-5xl mb-4"></i>
                        <h4 class="text-xl font-bold mb-2"><a href="{{-- {{ route('commercial_report') }} --}}" class="">Informe Comercial</a></h4>
                        <p class="text-sm">Máxima Hisibilidad Histórica y Tendencial.</p>
                    </div>
                    <div class="text-center p-6 shadow-lg rounded-lg bg-blue-500 text-white">
                        <i class="fas fa-money-check text-5xl mb-4"></i>
                        <h4 class="text-xl font-bold mb-2"><a href="{{-- {{ route('nexor_community') }} --}}" class="hover:text-gray-200">Sector de Cheques</a></h4>
                        <p class="text-sm">Prevención Operativa de Fraude e Incumplimiento.</p>
                    </div>
                    <div class="text-center p-6 shadow-lg rounded-lg bg-blue-500 text-white">
                        <i class="fas fa-users text-5xl mb-4"></i>
                        <h4 class="text-xl font-bold mb-2"><a href="{{-- {{ route('user_generation') }} --}}" class="">Generación de usuarios</a></h4>
                        <p class="text-sm">Doble Capa de Seguridad.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ======= Call To Action Section ======= -->
        <section id="call-to-action" class="py-20 text-white">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-4xl font-bold mb-4">Servicio gratis por 30 días</h2>
                <h3 class="text-2xl mb-6">Evalúe sin compromiso de compra todos nuestros servicios, accediendo al mismo en su totalidad</h3>
                <p class="max-w-3xl mx-auto mb-8">Pruebe <strong>gratuitamente</strong>, información comercial <b>exclusiva</b> con consultas on-line sobre: Comportamiento comercial con <i>Scoring</i> y control diario de su cartera de riesgo.</p>
                <a class="inline-block bg-white text-blue-600 font-bold py-3 px-8 rounded-full hover:bg-gray-200 transition" href="{{-- {{ route('register') }} --}}">Sea parte</a>
            </div>
        </section>

        <!-- ======= Services Section ======= -->
        <section id="services" class="py-16 bg-gray-50">
            <div class="container mx-auto px-4">
                <header class="text-center mb-12">
                    <h3 class="text-3xl font-bold text-gray-800">Servicios</h3>
                    <p class="italic text-lg">Crecer es posible... <i>Con las herramientas adecuadas.</i></p>
                </header>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="text-center p-6">
                        <div class="flex justify-center items-center mb-4"><i class="fas fa-users text-4xl text-blue-500"></i></div>
                        <h4 class="text-xl font-bold mb-2"><a href="" target="_blank" class="text-gray-800 hover:text-blue-500">Generación de usuarios</a></h4>
                        <p class="text-black">Esta funcionalidad es nuestro diferenciador estratégico. Al incentivar la transparencia mediante la oferta gratuita a sus socios, usted blinda su cadena de suministro. Puede monitorear vulnerabilidad en su cartera cercana. Esto le permite proteger su propio capital, asegurando la continuidad de la operación y transformando el due diligence en una asociación estratégica.</p>
                    </div>
                    <div class="text-center p-6">
                        <div class="flex justify-center items-center mb-4"><i class="fas fa-file-invoice text-4xl text-blue-500"></i></div>
                        <h4 class="text-xl font-bold mb-2"><a href="" target="_blank" class="text-gray-800 hover:text-blue-500">Informe</a></h4>
                        <p class="text-black">Nuestra plataforma le proporciona una visión profunda y tendencial al ofrecer un historial de 24 meses, en estricta alineación con el estándar de difusión del BCRA. Esto va más allá de un estado estático; le permite evaluar patrones de pago consistentes y la trayectoria real de la salud financiera de una entidad, habilitando una toma de decisiones informada sobre la solvencia a largo plazo.</p>
                    </div>
                    <div class="text-center p-6">
                        <div class="flex justify-center items-center mb-4"><i class="fas fa-money-check text-4xl text-blue-500"></i></div>
                        <h4 class="text-xl font-bold mb-2"><a href="" target="_blank" class="text-gray-800 hover:text-blue-500">Informe de cheques rechazados</a></h4>
                        <p class="text-black">Los cheques devueltos son un indicador directo de la disciplina de flujo de caja y la salud operativa de un socio. Un monitoreo constante de esta información, regulada bajo la Ley 25.730 , le permite anticipar problemas de liquidez a corto plazo que no siempre se reflejan inmediatamente en el crédito bancario formal, asegurando la estabilidad transaccional.</p>
                    </div>
                    <div class="text-center p-6">
                        <div class="flex justify-center items-center mb-4"><i class="fas fa-eye text-4xl text-blue-500"></i></div>
                        <h4 class="text-xl font-bold mb-2"><a href="" target="_blank" class="text-gray-800 hover:text-blue-500">Seguimiento</a></h4>
                        <p class="text-black">El riesgo es dinámico. Nuestro servicio garantiza que su gestión no sea reactiva. Al recibir notificaciones automáticas e inteligentes sobre cualquier deterioro crediticio o cambio de situación, su equipo puede ajustar límites de crédito, renegociar plazos o buscar alternativas estratégicas antes de que el riesgo se materialice en una pérdida</p>
                    </div>
                    <div class="text-center p-6">
                        <div class="flex justify-center items-center mb-4"><i class="fas fa-question text-4xl text-blue-500"></i></div>
                        <h4 class="text-xl font-bold mb-2"><a href="#" class="text-gray-800">Sector de cheques individuales</a></h4>
                        <p class="text-black">Ofrecemos la capacidad de eliminar la incertidumbre en cada operación crítica. Verificamos la validez de un cheque en el momento, identificando no solo la causa del rechazo, sino también quién realizó la denuncia. Esto proporciona un valor inmediato, blindando sus procesos de aceptación de pagos y minimizando riesgos legales y financieros en tiempo real.</p>
                    </div>
                    {{-- <div class="text-center p-6">
                        <div class="flex justify-center items-center mb-4"><i class="fas fa-chart-line text-4xl text-blue-500"></i></div>
                        <h4 class="text-xl font-bold mb-2"><a href="#" class="text-gray-800 cursor-not-allowed">Scoring</a></h4>
                        <p>Análisis por sistema de las variables más importantes del informe. Es una síntesis que se visualiza en forma previa a desarrollo del informe, simplificando la lectura.</p>
                    </div> --}}
                </div>
            </div>
        </section>

        <!-- ======= About Us Section ======= -->
{{--         <section id="about" class="py-16">
            <div class="container mx-auto px-4">
                <header class="text-center mb-12">
                    <h3 class="text-3xl font-bold text-gray-800">Nexor Informes Comerciales</h3>
                    <p class="italic text-lg">Breve reseña de nuestra historia</p>
                </header>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="shadow-lg">
                        <div class="relative">
                            <img src="{{ asset('img/about-mission.jpg') }}" alt="Nuestra Experiencia" class="w-full">
                            <div class="absolute bottom-4 left-4 bg-blue-500 text-white rounded-full p-3"><i class="fas fa-tachometer-alt text-2xl"></i></div>
                        </div>
                        <div class="p-6">
                            <h2 class="text-xl font-bold text-gray-800">Nuestra experiencia</h2>
                            <p class="mt-2">El sitio de consultas sintetiza la experiencia de 43 años informando sobre el riesgo de crédito. En estas 4 décadas nos fuimos adaptando a los avatares económicos.</p>
                        </div>
                    </div>
                    <div class="shadow-lg">
                        <div class="relative">
                            <img src="{{ asset('img/about-vision.jpg') }}" alt="Utilidad del servicio" class="w-full">
                             <div class="absolute bottom-4 left-4 bg-blue-500 text-white rounded-full p-3"><i class="fas fa-eye text-2xl"></i></div>
                        </div>
                         <div class="p-6">
                            <h2 class="text-xl font-bold text-gray-800">Utilidad del servicio</h2>
                            <p class="mt-2"><b>El ahora</b>, brindando en segundos el historial del comportamiento de pago. <b>El futuro</b>, colocando al registro bajo control comercial diario y automático. La atención personalizada complementa nuestra gestión.</p>
                        </div>
                    </div>
                    <div class="shadow-lg">
                         <div class="relative">
                            <img src="{{ asset('img/about-plan.jpg') }}" alt="Actualmente" class="w-full">
                             <div class="absolute bottom-4 left-4 bg-blue-500 text-white rounded-full p-3"><i class="fas fa-list-alt text-2xl"></i></div>
                        </div>
                         <div class="p-6">
                            <h2 class="text-xl font-bold text-gray-800">Actualmente</h2>
                            <p class="mt-2">Hoy, los cambios en las características del riesgo comercial y en las estructuras administrativas nos han llevado a crear un sistema on-line amigable y práctico que puede ser utilizado sin necesidad de ser especialista.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="py-16 bg-gray-100">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h3 class="text-3xl font-bold text-gray-800">Contacto</h3>
                    <p class="text-lg">Contáctenos y le remitiremos claves para un periodo de evaluación gratuita</p>
                </div>
                <div class="grid md:grid-cols-3 gap-8 text-center mb-8">
                    <div>
                        <div class="p-6 bg-white rounded-lg shadow-md">
                            <i class="fas fa-power-off text-3xl text-blue-500 mb-3"></i>
                            <h3 class="text-xl font-bold">Sistema</h3>
                            <a href="https://www.nexor.com.ar" class="text-blue-500 hover:underline">Nexor informes</a> |
                            <a href="{{-- {{ route('illustrative') }} --}}" class="text-blue-500 hover:underline">Nexor ilustrativo</a>
                        </div>
                    </div>
                    <div>
                        <div class="p-6 bg-white rounded-lg shadow-md">
                            <i class="fas fa-phone text-3xl text-blue-500 mb-3"></i>
                            <h3 class="text-xl font-bold">Teléfono</h3>
                            <p><a href="tel:+549111144774083" class="text-blue-500 hover:underline">+54 911 1144774083</a> |<a href="tel:+541175117610" class="text-blue-500 hover:underline"> +54 1175117610</a></p>
                        </div>
                    </div>
                    <div>
                        <div class="p-6 bg-white rounded-lg shadow-md">
                            <i class="fas fa-envelope text-3xl text-blue-500 mb-3"></i>
                            <h3 class="text-xl font-bold">Email</h3>
                            <p><a href="mailto:contacto@nexor.com.ar" class="text-blue-500 hover:underline">contacto@nexor.com.ar</a></p>
                        </div>
                    </div>
                </div>
                <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md">
                    <form action="{{-- {{ route('contact.send') }} --}}" method="post" role="form">
                        @csrf
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <input type="email" name="email" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" placeholder="Email*" required />
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <input type="text" name="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" placeholder="Nombre*" required />
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <input type="tel" name="tel" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" placeholder="Teléfono" />
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <input type="text" name="empresa" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" placeholder="La empresa que representa" />
                            </div>
                             <div class="w-full md:w-1/3 px-3">
                                <input type="text" name="ubicacion" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" placeholder="Localidad" />
                            </div>
                        </div>
                        <div class="mb-6">
                            <select name="subject" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" required>
                                <option selected disabled>Seleccione su Asunto*</option>
                                <option value="Acceso Gratis">Acceso Gratis</option>
                                <option value="Ayuda personalizada">Ayuda personalizada</option>
                                <option value="Primer contacto">Primer contacto</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                        <div class="mb-6">
                            <textarea name="message" rows="5" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" placeholder="Mensaje*" required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-full">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <script>
        // Simple script to handle header background change on scroll
        const header = document.getElementById('header');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 100) {
                header.classList.remove('bg-transparent');
                header.classList.add('bg-black', 'bg-opacity-80');
            } else {
                header.classList.add('bg-transparent');
                header.classList.remove('bg-black', 'bg-opacity-80');
            }
        });
    </script>
</body>

@endsection

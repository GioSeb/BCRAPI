<footer id="footer" class="bg-gray-800 text-white w-full">
    <div class="container mx-auto px-6 py-6"> {{-- Changed py-12 to py-6 --}}
        <!-- Grid container for footer sections -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

            <!-- Footer Info Section -->
            <div class="lg:col-span-2">
                <h3 class="text-2xl font-bold mb-4">Nexor</h3>
                <p class="text-gray-400 leading-relaxed">
                    Contáctenos y le remitiremos claves para un periodo de evaluación gratuita.
                    Planes comerciales para Cámaras, Empresas, Pymes y Micro emprendimientos.
                </p>
            </div>

            <!-- Contact Section (always visible in footer) -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Contacto</h4>
                <p class="text-gray-400">
                    <strong class="text-gray-200">Teléfono:</strong> 011-7511-7610 de 10hs. a 16hs.<br>
                    <strong class="text-gray-200">Email:</strong> contacto@nexor.com.ar<br>
                </p>

                {{-- Conditional rendering for social media links: Only if logged in AND not on 'index' page --}}
                @auth
                    @if (Route::currentRouteName() !== 'index') {{-- Assumes 'index' is the name of your home route --}}
                        <!-- Social Media Links -->
                        <div class="mt-6 flex space-x-4">
                            <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                                <i class="fab fa-twitter fa-lg"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                                <i class="fab fa-facebook-f fa-lg"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                                <i class="fab fa-instagram fa-lg"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                                <i class="fab fa-google-plus-g fa-lg"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                                <i class="fab fa-linkedin-in fa-lg"></i>
                            </a>
                        </div>
                    @endif
                @endauth
            </div>

        <!-- Copyright Section -->
        <div class="mt-8 pt-4  border-gray-700 text-center"> {{-- Changed mt-12 to mt-8 and pt-8 to pt-4 --}}
            <p class="text-gray-500">&copy; Copyright <strong>Nexor</strong>. Derechos reservados.</p>
            <p class="text-gray-500">Desarrollado por Sebastián Gioiose.</p>
        </div>
    </div>
</footer>

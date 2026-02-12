@extends('layouts.public')
@section('title', 'Contacto - Mi Tienda')

@section('content')
<div class="container mx-auto px-6 py-10">
    <div class="max-w-2xl mx-auto">
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-900 mb-3">Atencion al Cliente</h1>
            <p class="text-gray-600">Si tienes alguna consulta, completa el siguiente formulario.</p>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-8">
            <form id="contact-form" class="space-y-5" novalidate>
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        required
                        class="w-full rounded-lg border-gray-300 focus:border-primary-600 focus:ring-primary-600"
                        placeholder="Ingresa tu nombre"
                    >
                    <p class="mt-1 text-sm text-red-600 hidden" data-error-for="name">El nombre no puede estar vacio.</p>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo electronico</label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        required
                        class="w-full rounded-lg border-gray-300 focus:border-primary-600 focus:ring-primary-600"
                        placeholder="nombre@ejemplo.com"
                    >
                    <p class="mt-1 text-sm text-red-600 hidden" data-error-for="email">Ingresa un correo valido y no vacio.</p>
                </div>

                <div>
                    <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Asunto</label>
                    <input
                        id="subject"
                        name="subject"
                        type="text"
                        required
                        class="w-full rounded-lg border-gray-300 focus:border-primary-600 focus:ring-primary-600"
                        placeholder="Ingresa el asunto"
                    >
                    <p class="mt-1 text-sm text-red-600 hidden" data-error-for="subject">El asunto no puede estar vacio.</p>
                </div>

                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Mensaje</label>
                    <textarea
                        id="message"
                        name="message"
                        rows="5"
                        required
                        class="w-full rounded-lg border-gray-300 focus:border-primary-600 focus:ring-primary-600"
                        placeholder="Escribe tu mensaje"
                    ></textarea>
                    <p class="mt-1 text-sm text-red-600 hidden" data-error-for="message">El mensaje no puede estar vacio.</p>
                </div>

                <div class="pt-2">
                    <button
                        type="submit"
                        class="inline-flex items-center rounded-lg bg-primary-600 px-6 py-2.5 text-white font-medium hover:bg-primary-700 transition"
                    >
                        Enviar
                    </button>
                </div>

                <p id="contact-form-note" class="text-sm text-green-700 hidden">Validacion completada. Este boton aun no esta conectado al backend.</p>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
(function () {
    const form = document.getElementById('contact-form');
    if (!form) return;

    const fields = ['name', 'email', 'subject', 'message'];
    const note = document.getElementById('contact-form-note');

    function showError(fieldId, hasError) {
        const errorEl = form.querySelector('[data-error-for="' + fieldId + '"]');
        if (!errorEl) return;
        errorEl.classList.toggle('hidden', !hasError);
    }

    function validateField(fieldId) {
        const el = document.getElementById(fieldId);
        if (!el) return true;

        const value = (el.value || '').trim();
        const isEmpty = value.length === 0;
        const isEmailInvalid = fieldId === 'email' && (!el.checkValidity() || isEmpty);
        const hasError = fieldId === 'email' ? isEmailInvalid : isEmpty;

        showError(fieldId, hasError);
        return !hasError;
    }

    fields.forEach(function (fieldId) {
        const el = document.getElementById(fieldId);
        if (!el) return;
        el.addEventListener('input', function () {
            validateField(fieldId);
        });
        el.addEventListener('blur', function () {
            validateField(fieldId);
        });
    });

    form.addEventListener('submit', function (event) {
        event.preventDefault();
        let allValid = true;

        fields.forEach(function (fieldId) {
            const valid = validateField(fieldId);
            if (!valid) allValid = false;
        });

        if (note) {
            note.classList.toggle('hidden', !allValid);
        }
    });
})();
</script>
@endpush

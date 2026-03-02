<div class="step-content hidden p-6" data-step="5">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Photos et finalisation</h2>
    <div class="space-y-6">
        <div>
            <h3 class="text-lg font-medium text-gray-900 mb-3">Photos du bien *</h3>
            <p class="text-sm text-gray-500 mb-4">Ajoutez jusqu'à 10 photos. La première photo sera utilisée comme photo de couverture.</p>

            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg">
                <div class="space-y-1 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600">
                        <label for="photos" class="relative cursor-pointer bg-white rounded-md font-medium text-green-600 hover:text-green-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-green-500">
                            <span>Téléverser des fichiers</span>
                            <input id="photos" name="photos[]" type="file" class="sr-only" multiple accept="image/*" required>
                        </label>
                        <p class="pl-1">ou glisser-déposer</p>
                    </div>
                    <p class="text-xs text-gray-500">PNG, JPG, GIF jusqu'à 10MB</p>
                </div>
            </div>

            <div id="preview" class="mt-4 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <!-- Preview images will be added here -->
            </div>
        </div>

        <div class="pt-4 border-t border-gray-200">
            <h3 class="text-lg font-medium text-gray-900 mb-3">Contact</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Téléphone *</label>
                    <input type="tel" id="phone" name="phone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Ex: 06 12 34 56 78" required>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="votre@email.com" required>
                </div>
            </div>
        </div>

        <div class="pt-4 border-t border-gray-200">
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="terms" name="terms" type="checkbox" class="h-4 w-4 text-green-600 rounded border-gray-300 focus:ring-green-500" required>
                </div>
                <div class="ml-3 text-sm">
                    <label for="terms" class="font-medium text-gray-700">J'accepte les <a href="#" class="text-green-600 hover:text-green-500">conditions d'utilisation</a> et la <a href="#" class="text-green-600 hover:text-green-500">politique de confidentialité</a> *</label>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8 flex justify-between">
        <button type="button" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors prev-step">
            ← Précédent
        </button>
        <button type="submit" class="px-6 py-2.5 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
            Publier l'annonce
        </button>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('photos');
    const preview = document.getElementById('preview');

    fileInput.addEventListener('change', function(e) {
        // Clear previous previews
        preview.innerHTML = '';

        // Get all selected files
        const files = Array.from(e.target.files);

        // Limit to 10 files
        const selectedFiles = files.slice(0, 10);

        // Update file input with the limited selection
        const dataTransfer = new DataTransfer();
        selectedFiles.forEach(file => dataTransfer.items.add(file));
        fileInput.files = dataTransfer.files;

        // Create preview for each file
        selectedFiles.forEach((file, index) => {
            const reader = new FileReader();

            reader.onload = function(e) {
                const previewItem = document.createElement('div');
                previewItem.className = 'relative group';
                previewItem.innerHTML = `
                    <div class="aspect-w-16 aspect-h-12 rounded-lg overflow-hidden">
                        <img src="${e.target.result}" alt="Preview ${index + 1}" class="w-full h-32 object-cover">
                    </div>
                    <button type="button" class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition-opacity" data-index="${index}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                `;

                // Add remove functionality
                const removeBtn = previewItem.querySelector('button');
                removeBtn.addEventListener('click', function() {
                    // Remove from preview
                    preview.removeChild(previewItem);

                    // Remove from file input
                    const newFiles = Array.from(fileInput.files);
                    newFiles.splice(index, 1);

                    const newDataTransfer = new DataTransfer();
                    newFiles.forEach(file => newDataTransfer.items.add(file));
                    fileInput.files = newDataTransfer.files;
                });

                preview.appendChild(previewItem);
            };

            reader.readAsDataURL(file);
        });
    });
});
</script>

<div class="step-content p-6" data-step="1">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Type d'annonce</h2>
    <div class="space-y-6">
        <div>
            <h3 class="text-lg font-medium text-gray-900 mb-3">Type d'annonce *</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <label class="relative block cursor-pointer">
                    <input type="radio" name="listing_type" value="À-vendre" class="peer hidden" required>
                    <div class="p-4 border-2 rounded-lg hover:border-green-500 peer-checked:border-green-500 peer-checked:bg-green-50 transition-colors">
                        <div class="flex items-center justify-center">
                            <div class="text-lg font-medium">À vendre</div>
                        </div>
                    </div>
                </label>
                <label class="relative block cursor-pointer">
                    <input type="radio" name="listing_type" value="À-louer" class="peer hidden" required>
                    <div class="p-4 border-2 rounded-lg hover:border-green-500 peer-checked:border-green-500 peer-checked:bg-green-50 transition-colors">
                        <div class="flex items-center justify-center">
                            <div class="text-lg font-medium">À louer</div>
                        </div>
                    </div>
                </label>
            </div>
        </div>
    </div>

    <div class="mt-8 flex justify-end">
        <button type="button" class="px-6 py-2.5 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors next-step">
            Suivant →
        </button>
    </div>
</div>

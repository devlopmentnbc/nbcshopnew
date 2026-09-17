<!-- Create Citypak Pickup Modal -->
<div id="citypakPickupModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-slate-900/60 backdrop-blur-sm p-4 flex items-center justify-center">
    <div class="relative w-full max-w-xl rounded-2xl bg-white p-6 shadow-2xl transition-all">
        <div class="flex items-center justify-between border-b border-slate-100 pb-4 mb-4">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
                    <i data-lucide="truck" class="h-5 w-5"></i>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-slate-900">Request Citypak Courier Pickup</h3>
                    <p class="text-xs text-slate-500">Schedule a courier pickup request with Citypak Sri Lanka.</p>
                </div>
            </div>
            <button type="button" onclick="closePickupModal()" class="rounded-lg p-1.5 text-slate-400 hover:bg-slate-100 hover:text-slate-600 transition-colors">
                <i data-lucide="x" class="h-5 w-5"></i>
            </button>
        </div>

        <form action="{{ route('admin.citypak.pickup') }}" method="POST" class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Pickup Address Line 1 <span class="text-red-500">*</span></label>
                    <input type="text" name="pickup_address_line_1" value="{{ \App\Models\Setting::get('citypak_from_address_line_1', 'No 123 Main Street') }}" required class="h-9 w-full rounded-lg border border-slate-200 bg-slate-50/50 px-3 text-xs text-slate-800 focus:border-amber-500 focus:bg-white focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Pickup Address Line 2</label>
                    <input type="text" name="pickup_address_line_2" value="{{ \App\Models\Setting::get('citypak_from_address_line_2', '') }}" class="h-9 w-full rounded-lg border border-slate-200 bg-slate-50/50 px-3 text-xs text-slate-800 focus:border-amber-500 focus:bg-white focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">City <span class="text-red-500">*</span></label>
                    <input type="text" name="pickup_address_line_4_city" value="{{ \App\Models\Setting::get('citypak_from_address_line_4', 'Colombo') }}" required class="h-9 w-full rounded-lg border border-slate-200 bg-slate-50/50 px-3 text-xs text-slate-800 focus:border-amber-500 focus:bg-white focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Contact Person <span class="text-red-500">*</span></label>
                    <input type="text" name="pickup_contact_person" value="{{ \App\Models\Setting::get('citypak_from_contact_name', 'Dispatch Manager') }}" required class="h-9 w-full rounded-lg border border-slate-200 bg-slate-50/50 px-3 text-xs text-slate-800 focus:border-amber-500 focus:bg-white focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Contact Number <span class="text-red-500">*</span></label>
                    <input type="text" name="pickup_contact_number_1" value="{{ \App\Models\Setting::get('citypak_from_contact_1', '0771234567') }}" required class="h-9 w-full rounded-lg border border-slate-200 bg-slate-50/50 px-3 text-xs text-slate-800 focus:border-amber-500 focus:bg-white focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Waybills / Orders Count <span class="text-red-500">*</span></label>
                    <input type="number" id="pickup_waybill_count" name="estimated_waybill_count" value="1" min="1" required class="h-9 w-full rounded-lg border border-slate-200 bg-slate-50/50 px-3 text-xs text-slate-800 focus:border-amber-500 focus:bg-white focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Est. Total Weight (Grams) <span class="text-red-500">*</span></label>
                    <input type="number" id="pickup_weight_grams" name="estimated_pickup_weight_grams" value="1000" min="100" required class="h-9 w-full rounded-lg border border-slate-200 bg-slate-50/50 px-3 text-xs text-slate-800 focus:border-amber-500 focus:bg-white focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Pickup Window From <span class="text-red-500">*</span></label>
                    <input type="datetime-local" name="pickup_from_datetime" value="{{ now()->addHour()->format('Y-m-d\TH:i') }}" required class="h-9 w-full rounded-lg border border-slate-200 bg-slate-50/50 px-3 text-xs text-slate-800 focus:border-amber-500 focus:bg-white focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Pickup Window To <span class="text-red-500">*</span></label>
                    <input type="datetime-local" name="pickup_to_datetime" value="{{ now()->addHours(5)->format('Y-m-d\TH:i') }}" required class="h-9 w-full rounded-lg border border-slate-200 bg-slate-50/50 px-3 text-xs text-slate-800 focus:border-amber-500 focus:bg-white focus:outline-none">
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                <button type="button" onclick="closePickupModal()" class="h-9 px-4 rounded-lg border border-slate-200 text-xs font-semibold text-slate-600 hover:bg-slate-50 transition-colors">
                    Cancel
                </button>
                <button type="submit" class="h-9 px-5 rounded-lg bg-amber-600 text-xs font-semibold text-white hover:bg-amber-700 transition-colors shadow-sm inline-flex items-center gap-2">
                    <i data-lucide="send" class="h-3.5 w-3.5"></i>
                    Schedule Pickup
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openPickupModal(waybillCount, weightGrams) {
        var modal = document.getElementById('citypakPickupModal');
        if (modal) {
            if (waybillCount) {
                var countEl = document.getElementById('pickup_waybill_count');
                if (countEl) countEl.value = waybillCount;
            }
            if (weightGrams) {
                var weightEl = document.getElementById('pickup_weight_grams');
                if (weightEl) weightEl.value = weightGrams;
            }
            modal.classList.remove('hidden');
        }
    }

    function closePickupModal() {
        var modal = document.getElementById('citypakPickupModal');
        if (modal) modal.classList.add('hidden');
    }
</script>

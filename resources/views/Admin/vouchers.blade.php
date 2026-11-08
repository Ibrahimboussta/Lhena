<x-app-layout>
    @section('title', 'Lhena.ma - Documents / vouchers')

    <style>
        .voucher-page {
            max-width: 1440px;
            margin: 0 auto;
        }

        .voucher-page__eyebrow {
            color: #947e55;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
        }

        .voucher-page__title {
            margin-top: 6px;
            color: #173f36;
            font-size: clamp(24px, 3vw, 32px);
            font-weight: 700;
            letter-spacing: -0.035em;
        }

        .voucher-page__subtitle {
            margin-top: 7px;
            color: #78827d;
            font-size: 14px;
        }

        .voucher-layout {
            display: grid;
            grid-template-columns: minmax(0, 1.5fr) minmax(280px, 0.8fr);
            align-items: start;
            gap: 24px;
            margin-top: 26px;
        }

        .voucher-panel {
            border: 1px solid #e4e9e5;
            border-radius: 14px;
            background: #fff;
            padding: 24px;
            box-shadow: 0 3px 12px rgba(32, 54, 43, 0.04);
        }

        .voucher-panel__title {
            margin-bottom: 5px;
            color: #26332e;
            font-size: 16px;
            font-weight: 700;
        }

        .voucher-panel__hint {
            margin-bottom: 22px;
            color: #78827d;
            font-size: 12px;
            line-height: 1.5;
        }

        .voucher-form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px 16px;
        }

        .voucher-field {
            min-width: 0;
        }

        .voucher-field--full {
            grid-column: 1 / -1;
        }

        .voucher-field label {
            display: block;
            margin-bottom: 7px;
            color: #435149;
            font-size: 12px;
            font-weight: 600;
        }

        .voucher-field input,
        .voucher-field select,
        .voucher-field textarea {
            width: 100%;
            min-height: 42px;
            border: 1px solid #dfe5df;
            border-radius: 8px;
            background: #fbfcfb;
            padding: 9px 11px;
            color: #26332e;
            font-size: 13px;
            outline: none;
        }

        .voucher-field textarea {
            min-height: 86px;
            resize: vertical;
        }

        .voucher-field input:focus,
        .voucher-field select:focus,
        .voucher-field textarea:focus {
            border-color: #8ba99a;
            box-shadow: 0 0 0 3px rgba(18, 63, 53, 0.08);
        }

        .voucher-code-row {
            display: flex;
            gap: 8px;
        }

        .voucher-code-row input {
            min-width: 0;
        }

        .voucher-code-generate {
            flex: 0 0 auto;
            border: 1px solid #dfe5df;
            border-radius: 8px;
            background: #f3f6f3;
            padding: 0 12px;
            color: #173f36;
            font-size: 11px;
            font-weight: 600;
        }

        .voucher-code-generate:hover {
            background: #e8efe9;
        }

        .voucher-notice {
            margin-top: 20px;
            border: 1px solid #e8dcc3;
            border-radius: 8px;
            background: #faf6ed;
            padding: 11px 13px;
            color: #716142;
            font-size: 11px;
            line-height: 1.5;
        }

        .voucher-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
        }

        .voucher-button {
            min-height: 40px;
            border-radius: 8px;
            padding: 9px 15px;
            font-size: 12px;
            font-weight: 600;
        }

        .voucher-button--secondary {
            border: 1px solid #dfe5df;
            background: #fff;
            color: #526057;
        }

        .voucher-button--primary {
            background: #173f36;
            color: #fff;
        }

        .voucher-button--primary:hover {
            background: #0c3028;
        }

        .voucher-preview {
            overflow: hidden;
            border: 1px solid #e4e9e5;
            border-radius: 14px;
            background: #fff;
            box-shadow: 0 3px 12px rgba(32, 54, 43, 0.04);
        }

        .voucher-preview__top {
            background: #173f36;
            padding: 22px;
            color: #fff;
        }

        .voucher-preview__label {
            color: #d9c79f;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 0.13em;
            text-transform: uppercase;
        }

        .voucher-preview__value {
            margin-top: 12px;
            font-size: 26px;
            font-weight: 700;
        }

        .voucher-preview__code {
            display: inline-block;
            margin-top: 16px;
            border: 1px dashed rgba(255, 255, 255, 0.5);
            border-radius: 6px;
            padding: 7px 10px;
            font-size: 12px;
            letter-spacing: 0.1em;
        }

        .voucher-preview__body {
            padding: 18px 22px;
        }

        .voucher-preview__row {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            border-bottom: 1px solid #edf0ed;
            padding: 11px 0;
            font-size: 11px;
        }

        .voucher-preview__row:last-child {
            border-bottom: 0;
        }

        .voucher-preview__row span:first-child {
            color: #78827d;
        }

        .voucher-preview__row span:last-child {
            color: #34443b;
            font-weight: 600;
            text-align: right;
        }

        @media (max-width: 900px) {
            .voucher-layout {
                grid-template-columns: minmax(0, 1fr);
            }
        }

        @media (max-width: 520px) {
            .voucher-panel {
                padding: 18px;
            }

            .voucher-form-grid {
                grid-template-columns: minmax(0, 1fr);
            }

            .voucher-field--full {
                grid-column: auto;
            }
        }
    </style>

    <div class="voucher-page">
        <div>
            <p class="voucher-page__eyebrow">Espace administration</p>
            <h1 class="voucher-page__title">Documents / vouchers</h1>
            <p class="voucher-page__subtitle">Préparez un voucher et ses conditions d’utilisation.</p>
        </div>

        <div class="voucher-layout" x-data="{
            code: '',
            kind: 'percentage',
            amount: '',
            client: '',
            property: '',
            startDate: '',
            endDate: '',
            maxUses: '1',
            generated: false,
            generateCode() {
                this.code = 'LHENA-' + Math.random().toString(36).slice(2, 8).toUpperCase();
            },
            formatDiscount() {
                if (!this.amount) return '—';
                return this.kind === 'percentage' ? this.amount + ' %' : this.amount + ' MAD';
            }
        }">
            <section class="voucher-panel">
                <h2 class="voucher-panel__title">Créer un voucher</h2>
                <p class="voucher-panel__hint">Renseignez les informations du voucher. Les champs sont présentés à titre d’aperçu.</p>

                <form @submit.prevent="generated = true">
                    <div class="voucher-form-grid">
                        <div class="voucher-field voucher-field--full">
                            <label for="voucher-code">Code du voucher</label>
                            <div class="voucher-code-row">
                                <input id="voucher-code" type="text" x-model="code" placeholder="Ex. LHENA-ETE26">
                                <button class="voucher-code-generate" type="button" @click="generateCode()">Générer un code</button>
                            </div>
                        </div>

                        <div class="voucher-field">
                            <label for="voucher-type">Type de réduction</label>
                            <select id="voucher-type" x-model="kind">
                                <option value="percentage">Pourcentage (%)</option>
                                <option value="fixed">Montant fixe (MAD)</option>
                            </select>
                        </div>
                        <div class="voucher-field">
                            <label for="voucher-amount">Valeur de la réduction</label>
                            <input id="voucher-amount" type="number" min="1" x-model="amount" placeholder="Ex. 10">
                        </div>

                        <div class="voucher-field">
                            <label for="voucher-start">Valable à partir du</label>
                            <input id="voucher-start" type="date" x-model="startDate">
                        </div>
                        <div class="voucher-field">
                            <label for="voucher-end">Valable jusqu’au</label>
                            <input id="voucher-end" type="date" x-model="endDate">
                        </div>

                        <div class="voucher-field">
                            <label for="voucher-client">Client (facultatif)</label>
                            <input id="voucher-client" type="text" x-model="client" placeholder="Nom du client">
                        </div>
                        <div class="voucher-field">
                            <label for="voucher-property">Propriété concernée</label>
                            <select id="voucher-property" x-model="property">
                                <option value="">Toutes les propriétés</option>
                            </select>
                        </div>

                        <div class="voucher-field">
                            <label for="voucher-uses">Nombre maximum d’utilisations</label>
                            <input id="voucher-uses" type="number" min="1" x-model="maxUses">
                        </div>
                        <div class="voucher-field">
                            <label for="voucher-status">Statut initial</label>
                            <select id="voucher-status">
                                <option>Actif</option>
                                <option>Brouillon</option>
                            </select>
                        </div>

                        <div class="voucher-field voucher-field--full">
                            <label for="voucher-terms">Conditions / note interne</label>
                            <textarea id="voucher-terms" placeholder="Ajoutez les conditions d’utilisation du voucher…"></textarea>
                        </div>
                    </div>

                    <p class="voucher-notice">
                        Cette page est une maquette d’interface : aucune information n’est enregistrée et aucun changement n’est effectué en base de données.
                    </p>
                    <div class="voucher-actions">
                        <button class="voucher-button voucher-button--secondary" type="reset">Effacer</button>
                        <button class="voucher-button voucher-button--primary" type="submit">Prévisualiser le voucher</button>
                    </div>
                    <p x-cloak x-show="generated" class="mt-3 text-right text-xs font-medium text-[#173f36]" role="status">
                        Aperçu mis à jour — aucune donnée n’a été enregistrée.
                    </p>
                </form>
            </section>

            <aside class="voucher-preview" aria-label="Aperçu du voucher">
                <div class="voucher-preview__top">
                    <p class="voucher-preview__label">Lhena · Séjour d’exception</p>
                    <p class="voucher-preview__value" x-text="formatDiscount()">—</p>
                    <p class="text-xs text-white/75">de réduction</p>
                    <p class="voucher-preview__code" x-text="code || 'CODE-VOUCHER'"></p>
                </div>
                <div class="voucher-preview__body">
                    <div class="voucher-preview__row">
                        <span>Bénéficiaire</span>
                        <span x-text="client || 'Non attribué'"></span>
                    </div>
                    <div class="voucher-preview__row">
                        <span>Propriété</span>
                        <span x-text="property || 'Toutes les propriétés'"></span>
                    </div>
                    <div class="voucher-preview__row">
                        <span>Validité</span>
                        <span x-text="(startDate || '—') + ' → ' + (endDate || '—')"></span>
                    </div>
                    <div class="voucher-preview__row">
                        <span>Utilisations</span>
                        <span x-text="maxUses || '—'"></span>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</x-app-layout>

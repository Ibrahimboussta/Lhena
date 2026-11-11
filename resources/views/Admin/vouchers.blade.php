<x-app-layout title="SorvaRent">

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
            <p class="voucher-page__eyebrow">{{ __('ui.admin_documents') }}</p>
            <h1 class="voucher-page__title">{{ __('ui.admin_reservation_confirmation_title') }}</h1>
            <p class="voucher-page__subtitle">{{ __('ui.admin_reservation_confirmation_subtitle') }}</p>
        </div>

        <div class="voucher-layout" x-data="{
            code: '',
            client: '',
            startDate: '',
            endDate: '',
            maxUses: '1',
            generated: false,
            downloadError: '',
            generateCode() {
                this.code = 'SorvaRent-' + Math.random().toString(36).slice(2, 8).toUpperCase();
            },
            async downloadVoucher() {
                try {
                    const pdf = new window.jsPDF({ unit: 'mm', format: 'a4' });
                    const pageWidth = pdf.internal.pageSize.getWidth();
                    const pageHeight = pdf.internal.pageSize.getHeight();
                    const margin = 16;
                    const cardWidth = pageWidth - margin * 2;
                    const cardX = margin;
                    const logoResponse = await fetch('{{ asset('images/pdfLogo.png') }}');
                    if (!logoResponse.ok) throw new Error('Logo SorvaRent introuvable.');
                    const logoBlob = await logoResponse.blob();
                    const logoData = await new Promise((resolve, reject) => {
                        const reader = new FileReader();
                        reader.onload = () => resolve(reader.result);
                        reader.onerror = () => reject(new Error('Impossible de lire le logo SorvaRent.'));
                        reader.readAsDataURL(logoBlob);
                    });

                    pdf.setProperties({
                        title: 'Confirmation de réservation ' + (this.code || 'SorvaRent'),
                        subject: 'Confirmation de réservation SorvaRent',
                        creator: 'SorvaRent'
                    });
                    pdf.setFillColor(247, 248, 246);
                    pdf.rect(0, 0, pageWidth, pageHeight, 'F');
                    pdf.setFillColor(255, 255, 255);
                    pdf.setDrawColor(226, 233, 228);
                    pdf.roundedRect(cardX, 14, cardWidth, pageHeight - 28, 5, 5, 'FD');

                    const headerY = 14;
                    const headerHeight = 91;
                    pdf.setFillColor(10, 42, 37);
                    pdf.roundedRect(cardX, headerY, cardWidth, headerHeight, 5, 5, 'F');
                    pdf.rect(cardX, headerY + headerHeight - 5, cardWidth, 5, 'F');

                    pdf.addImage(logoData, 'PNG', cardX + 12, headerY + 14, 39, 16.5);

                    pdf.setTextColor(217, 199, 159);
                    pdf.setFont('helvetica', 'bold');
                    pdf.setFontSize(9);
                    pdf.text('SORVARENT  |  SÉJOUR D’EXCEPTION', cardX + 61, headerY + 21);
                    pdf.setTextColor(255, 255, 255);
                    pdf.setFontSize(20);
                    pdf.text('Confirmation de réservation', cardX + 61, headerY + 34);
                    pdf.setTextColor(223, 233, 227);
                    pdf.setFont('helvetica', 'normal');
                    pdf.setFontSize(9);
                    pdf.text('Une attention spéciale pour votre prochain séjour', cardX + 61, headerY + 42);

                    const codeBoxX = cardX + 12;
                    const codeBoxY = headerY + 56;
                    const codeBoxWidth = cardWidth - 24;
                    pdf.setDrawColor(217, 199, 159);
                    pdf.setLineWidth(0.35);
                    pdf.setLineDash([1.5, 1.5], 0);
                    pdf.roundedRect(codeBoxX, codeBoxY, codeBoxWidth, 24, 2.5, 2.5, 'S');
                    pdf.setLineDash([], 0);
                    pdf.setTextColor(255, 255, 255);
                    pdf.setFont('helvetica', 'bold');
                    const code = this.code.trim() || 'CODE-CONFIRMATION';
                    let codeFontSize = 17;
                    while (codeFontSize > 10 && pdf.getTextWidth(code) * (codeFontSize / 17) > codeBoxWidth - 16) {
                        codeFontSize -= 1;
                    }
                    pdf.setFontSize(codeFontSize);
                    pdf.text(code, pageWidth / 2, codeBoxY + 15, { align: 'center' });

                    let y = headerY + headerHeight + 20;
                    const left = cardX + 13;
                    const right = cardX + cardWidth - 13;
                    pdf.setTextColor(148, 126, 85);
                    pdf.setFont('helvetica', 'bold');
                    pdf.setFontSize(9);
                    pdf.text('DÉTAILS DE LA CONFIRMATION DE RÉSERVATION', left, y);
                    y += 11;

                    const formatDate = value => {
                        if (!value) return '—';
                        const [year, month, day] = value.split('-');
                        return day + '/' + month + '/' + year;
                    };
                    const rows = [
                        ['Bénéficiaire', this.client.trim() || 'Non attribué'],
                        ['Valable du', formatDate(this.startDate)],
                        ['Valable jusqu’au', formatDate(this.endDate)],
                        ['Nombre d’utilisations', this.maxUses || '—']
                    ];

                    rows.forEach(([label, value], index) => {
                        const maxValueWidth = right - left - 52;
                        const valueLines = pdf.splitTextToSize(String(value), maxValueWidth);
                        const rowHeight = Math.max(19, valueLines.length * 5 + 9);
                        if (index % 2 === 0) {
                            pdf.setFillColor(248, 249, 247);
                            pdf.roundedRect(left - 3, y - 5, right - left + 6, rowHeight, 2, 2, 'F');
                        }
                        pdf.setFont('helvetica', 'normal');
                        pdf.setFontSize(10);
                        pdf.setTextColor(120, 130, 125);
                        pdf.text(label, left, y + 3);
                        pdf.setFont('helvetica', 'bold');
                        pdf.setTextColor(52, 68, 59);
                        pdf.setFontSize(10);
                        pdf.text(valueLines, right, y + 3, { align: 'right' });
                        y += rowHeight;
                    });

                    const footerY = pageHeight - 51;
                    pdf.setDrawColor(226, 233, 228);
                    pdf.setLineWidth(0.4);
                    pdf.line(left, footerY, right, footerY);
                    pdf.setTextColor(23, 63, 54);
                    pdf.setFont('helvetica', 'bold');
                    pdf.setFontSize(10);
                    pdf.text('Merci de choisir SorvaRent', pageWidth / 2, footerY + 12, { align: 'center' });
                    pdf.setTextColor(120, 130, 125);
                    pdf.setFont('helvetica', 'normal');
                    pdf.setFontSize(8);
                    pdf.text('Présentez ce code lors de votre réservation.', pageWidth / 2, footerY + 19, { align: 'center' });
                    pdf.setTextColor(148, 126, 85);
                    pdf.setFont('helvetica', 'bold');
                    pdf.setFontSize(8);
                    pdf.text('SORVARENT.MA', pageWidth / 2, footerY + 27, { align: 'center' });

                    pdf.save((this.code.trim() || 'SORVARENT-CONFIRMATION') + '.pdf');
                    this.downloadError = '';
                } catch (error) {
                    console.error('Impossible de télécharger la confirmation de réservation PDF.', error);
                    this.downloadError = @js(__('ui.admin_pdf_download_failed'));
                }
            }
        }">
            <section class="voucher-panel">
                <h2 class="voucher-panel__title">{{ __('ui.admin_create_reservation_confirmation') }}</h2>
                <p class="voucher-panel__hint">{{ __('ui.admin_reservation_confirmation_hint') }}</p>

                <form @submit.prevent="generated = true">
                    <div class="voucher-form-grid">
                        <div class="voucher-field voucher-field--full">
                            <label for="voucher-code">{{ __('ui.admin_confirmation_code') }}</label>
                            <div class="voucher-code-row">
                                <input id="voucher-code" type="text" x-model="code" placeholder="{{ __('ui.admin_code_example') }}">
                                <button class="voucher-code-generate" type="button" @click="generateCode()">{{ __('ui.admin_generate_code') }}</button>
                            </div>
                        </div>

                        <div class="voucher-field">
                            <label for="voucher-start">{{ __('ui.admin_valid_from_date') }}</label>
                            <input id="voucher-start" type="date" x-model="startDate">
                        </div>
                        <div class="voucher-field">
                            <label for="voucher-end">{{ __('ui.admin_valid_until_date') }}</label>
                            <input id="voucher-end" type="date" x-model="endDate">
                        </div>

                        <div class="voucher-field">
                            <label for="voucher-client">{{ __('ui.admin_client_optional') }}</label>
                            <input id="voucher-client" type="text" x-model="client" placeholder="{{ __('ui.admin_client_name') }}">
                        </div>
                        <div class="voucher-field">
                            <label for="voucher-uses">{{ __('ui.admin_max_uses') }}</label>
                            <input id="voucher-uses" type="number" min="1" x-model="maxUses">
                        </div>
                        <div class="voucher-field">
                            <label for="voucher-status">{{ __('ui.admin_initial_status') }}</label>
                            <select id="voucher-status">
                                <option>{{ __('ui.admin_active') }}</option>
                                <option>{{ __('ui.admin_draft') }}</option>
                            </select>
                        </div>

                        <div class="voucher-field voucher-field--full">
                            <label for="voucher-terms">{{ __('ui.admin_internal_terms') }}</label>
                            <textarea id="voucher-terms" placeholder="{{ __('ui.admin_terms_placeholder') }}"></textarea>
                        </div>
                    </div>

                    <p class="voucher-notice">
                        {{ __('ui.admin_mock_notice') }}
                    </p>
                    <div class="voucher-actions">
                        <button class="voucher-button voucher-button--secondary" type="reset">{{ __('ui.admin_clear') }}</button>
                        <button class="voucher-button voucher-button--primary" type="submit">{{ __('ui.admin_preview_confirmation') }}</button>
                    </div>
                    <p x-cloak x-show="generated" class="mt-3 text-right text-xs font-medium text-[#173f36]" role="status">
                        {{ __('ui.admin_preview_updated') }}
                    </p>
                </form>
            </section>

            <aside class="voucher-preview" aria-label="{{ __('ui.admin_confirmation_preview') }}">
                <div class="voucher-preview__top">
                    <p class="voucher-preview__label">SorvaRent · {{ __('ui.admin_stay_exceptional') }}</p>
                    <p class="voucher-preview__value">{{ __('ui.admin_reservation_confirmation') }}</p>
                    <p class="voucher-preview__code" x-text="code || 'CODE-CONFIRMATION'"></p>
                </div>
                <div class="voucher-preview__body">
                    <div class="voucher-preview__row">
                        <span>{{ __('ui.admin_beneficiary') }}</span>
                        <span x-text="client || @js(__('ui.admin_unassigned'))"></span>
                    </div>
                    <div class="voucher-preview__row">
                        <span>{{ __('ui.admin_validity') }}</span>
                        <span x-text="(startDate || '—') + ' → ' + (endDate || '—')"></span>
                    </div>
                    <div class="voucher-preview__row">
                        <span>{{ __('ui.admin_usages') }}</span>
                        <span x-text="maxUses || '—'"></span>
                    </div>
                    <div class="voucher-actions">
                        <button class="voucher-button voucher-button--primary" type="button" @click="downloadVoucher()">
                            {{ __('ui.admin_download_pdf') }}
                        </button>
                    </div>
                    <p x-cloak x-show="downloadError" class="mt-3 text-right text-xs text-red-700" role="alert" x-text="downloadError"></p>
                </div>
            </aside>
        </div>
    </div>
</x-app-layout>

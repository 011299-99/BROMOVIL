{{-- resources/views/dashboard/partials/calc-modal.blade.php --}}
<div id="modal-calc" class="fixed inset-0 z-50 hidden">
  <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" data-close="#modal-calc"></div>
  <div class="absolute inset-x-0 top-10 mx-auto max-w-5xl px-6 animate-in">
    <div class="calc-wrap">
      <div class="flex items-center justify-between px-6 py-4 border-b border-white/20">
        <h3 class="font-semibold text-white">Calcula tu potencial de ganancias</h3>
        <button class="chip chip-white" data-close="#modal-calc">Cerrar</button>
      </div>

      <div class="p-6">
        <section id="calc-ganancias">
          <div class="grid lg:grid-cols-[1.1fr_.9fr] gap-6">
            {{-- Panel de inputs --}}
            <div class="card glass p-6">
              <div class="flex items-center justify-between">
                <h3 class="font-semibold text-white">Simulación</h3>
                <span class="badge badge-ghost">Ganancias aproximadas</span>
              </div>

              <div id="calc-plan-wrap" class="mt-6 field">
                <label class="label text-white/90">Plan</label>
                <div class="mt-2 flex flex-wrap gap-2">
                  <button type="button" class="chip is-active" data-bind="plan" data-value="basico">Básico ilimitado</button>
                  <button type="button" class="chip" data-bind="plan" data-value="ideal">Ideal ilimitado</button>
                  <button type="button" class="chip" data-bind="plan" data-value="poderoso">Poderoso ilimitado</button>
                </div>
                <p class="helper mt-2 text-white/70">Ganancia por activación según plan: <b id="calc-out-gan-plan">$50.00</b></p>
              </div>

              <div class="mt-6 field">
                <label class="label text-white/90">SIMs vendidas / mes</label>
                <div class="mt-2 flex flex-wrap items-center gap-2">
                  <button type="button" class="chip" data-bind="sims" data-value="0">0</button>
                  <button type="button" class="chip is-active" data-bind="sims" data-value="10">10</button>
                  <button type="button" class="chip" data-bind="sims" data-value="30">30</button>
                  <button type="button" class="chip" data-bind="sims" data-value="50">50</button>
                  <button type="button" class="chip" data-bind="sims" data-value="100">100</button>
                  <span class="ml-auto text-xs text-white/70">Valor actual: <b id="calc-out-sims">0</b></span>
                </div>
                <input id="calc-in-sims" type="range" min="0" max="300" value="0" step="1" class="mt-3 slider w-full">
              </div>

              <div id="calc-porta-section" class="mt-6 field">
                <label class="label text-white/90">Bono por portabilidad (por activación)</label>
                <div id="calc-porta-wrap" class="mt-2 flex flex-wrap gap-2">
                  <button type="button" class="chip is-active" data-bind="porta" data-value="0">$0</button>
                  <button type="button" class="chip" data-bind="porta" data-value="10">$10</button>
                  <button type="button" class="chip" data-bind="porta" data-value="30">$30</button>
                  <div class="input-wrp money">
                    <span class="input-prefix">$</span>
                    <input id="calc-in-porta" type="number" min="0" step="0.01" value="0" class="input-number w-24 inpt">
                    <span class="input-suffix">MXN</span>
                  </div>
                </div>
              </div>

              <div class="mt-6 field">
                <label class="label text-white/90">Comisión residual</label>
                <div class="mt-2 flex flex-wrap items-center gap-3">
                  <span class="pill pill-dark" id="calc-out-residual-badge">4%</span>
                  <label class="flex items-center gap-2 text-sm select-none text-white/80">
                    <input id="calc-in-doble" type="checkbox" class="toggle">
                    <span>Activaste + de 30 líneas (duplica a 8%)</span>
                  </label>
                </div>
                <p class="helper mt-2 text-white/70">Residual (4%): Básico <b>$3.96</b>, Ideal <b>$7.97</b>, Poderoso <b>$8.76</b>. Con 8% se duplica.</p>

                <div class="mt-4">
                  <label class="label text-white/90">Recargas <u>totales</u> del mes</label>
                  <div class="mt-2 flex flex-wrap gap-2">
                    <button type="button" class="chip" data-bind="recargas" data-value="10">10 recargas</button>
                    <button type="button" class="chip" data-bind="recargas" data-value="100">100 recargas</button>
                    <input id="calc-in-recargas" type="number" min="0" step="1" value="0" class="input-number w-24 inpt">
                  </div>
                </div>
              </div>

              <div class="mt-6 field">
                <div id="calc-sipab-wrap" class="mt-2 flex flex-wrap items-center gap-3">
                  <span class="helper text-white/80">Monto por recarga</span>
                  <div class="input-wrp money">
                    <span class="input-prefix">$</span>
                    <input id="calc-in-monto" type="number" min="0" step="0.01" value="99" class="input-number w-28 inpt">
                    <span class="input-suffix">MXN</span>
                  </div>
                  <div class="flex gap-2">
                    <button type="button" class="chip is-active" data-bind="monto" data-value="99">$99</button>
                    <button type="button" class="chip" data-bind="monto" data-value="199">$199</button>
                    <button type="button" class="chip" data-bind="monto" data-value="239">$239</button>
                  </div>
                </div>
              </div>
            </div>

            {{-- Panel resultados --}}
            <div class="card p-0 overflow-hidden res-panel">
              <div class="res-head">
                <div class="res-head__bg"></div>
                <div class="px-6 py-4 relative z-[1]">
                  <h3 class="font-semibold text-white">Resultados estimados</h3>
                  <p class="text-white/80 text-sm mt-1">Cálculo en tiempo real</p>
                </div>
              </div>

              <div class="p-6 grid grid-cols-2 gap-4">
                <div class="stat stat-line">
                  <div class="stat-k">Ganancia por venta</div>
                  <div id="calc-out-venta" class="stat-v">$0.00</div>
                </div>
                <div class="stat stat-line">
                  <div class="stat-k">Comisión residual por activación</div>
                  <div id="calc-out-residual" class="stat-v">$0.00</div>
                </div>
                <div class="stat stat-line">
                  <div class="stat-k">Ganancia por recarga</div>
                  <div id="calc-out-sipab" class="stat-v">$0.00</div>
                </div>

                <div class="col-span-2 stat-big glow">
                  <div class="stat-k">Ingreso total estimado / mes</div>
                  <div id="calc-out-total" class="stat-v-big">$0.00</div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</div>

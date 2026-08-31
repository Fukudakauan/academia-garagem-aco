<?php

declare(strict_types=1);

$media = [
    'hero' => asset('/assets/landing/hero-training.png'),
    'academy' => asset('/assets/landing/academy-real.png'),
    'professor' => asset('/assets/landing/professor-real.png'),
    'modalities' => [
        asset('/assets/landing/boxing-real.png'),
        asset('/assets/landing/muay-thai-real.png'),
        asset('/assets/landing/jiu-jitsu-real.png'),
        asset('/assets/landing/karate-real.png'),
    ],
    'gallery' => asset('/assets/landing/gallery-real.png'),
];

$whatsappUrl = (string) app_config('whatsapp_url', '#contato-info');
$landingModalityNames = [];
if (!empty($landingHasDatabase)) {
    foreach ($landingModalities as $landingModality) {
        $landingModalityNames[] = (string) ($landingModality['nome'] ?? 'Modalidade');
    }
} else {
    $landingModalityNames = ['Boxe', 'Muay Thai', 'Jiu-Jitsu', 'Karatê Shubu-Dô'];
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Garagem Aço: Boxe, Muay Thai, Jiu-Jitsu e Karatê Shubu-Dô em Santa Felicidade, Curitiba. Desde 2011.">
    <meta name="theme-color" content="#080808">
    <title>Garagem Aço | Academia de Artes Marciais</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Oswald:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('/css/landing.css')); ?>">
</head>
<body class="landing-page">
    <a class="landing-skip-link" href="#inicio">Pular para o conteúdo</a>

    <header class="landing-header">
        <div class="landing-container landing-header__inner">
            <a class="landing-brand" href="#inicio" aria-label="Garagem Aço — início">
                <img src="<?php echo e(asset('/assets/logo-garagem-aco.png')); ?>" alt="Garagem Aço — Desde 2011" width="68" height="60" fetchpriority="high" decoding="async">
                <span class="landing-brand__wordmark">GARAGEM <b>AÇO</b></span>
            </a>

            <nav class="landing-navigation" aria-label="Navegação principal">
                <a href="#academia">A Garagem</a>
                <a href="#modalidades">Modalidades</a>
                <a href="#metodo">Método</a>
                <a href="#professor">Professor</a>
                <a href="#horarios">Horários</a>
                    <a href="#galeria">Galeria</a>
                    <a href="#contato">Contato</a>
                    <a class="landing-access-link" href="<?php echo e(url('/login')); ?>">Entrar</a>
                    <a class="landing-btn landing-btn--small" href="#contato">Aula experimental</a>
            </nav>

            <details class="landing-mobile-menu">
                <summary aria-label="Abrir menu"><span></span><span></span><span></span></summary>
                <nav aria-label="Navegação mobile">
                    <a href="#academia">A Garagem</a>
                    <a href="#modalidades">Modalidades</a>
                    <a href="#metodo">Método</a>
                    <a href="#professor">Professor</a>
                    <a href="#horarios">Horários</a>
                    <a href="#galeria">Galeria</a>
                    <a href="#contato">Contato</a>
                    <a class="landing-access-link" href="<?php echo e(url('/login')); ?>">Entrar</a>
                    <a class="landing-btn" href="#contato">Aula experimental</a>
                </nav>
            </details>
        </div>
    </header>

    <main>
        <section class="landing-hero" id="inicio" aria-labelledby="hero-title">
            <div class="landing-hero__background-word" aria-hidden="true">AÇO</div>
            <div class="landing-hero__grid landing-container">
                <div class="landing-hero__content" data-reveal>
                    <p class="landing-kicker">Garagem Aço <span>/</span> Desde 2011</p>
                    <h1 id="hero-title">Força se <em>constrói.</em><br>Disciplina se <em>treina.</em></h1>
                    <p class="landing-hero__lead">Artes marciais para quem quer evoluir de verdade — com técnica, respeito e um treino que acompanha o seu ritmo.</p>
                    <div class="landing-actions">
                        <a class="landing-btn" href="#contato">Agende uma aula experimental <span aria-hidden="true">↗</span></a>
                        <a class="landing-btn landing-btn--outline" href="#modalidades">Conheça as modalidades</a>
                    </div>
                    <div class="landing-hero__meta" aria-label="Informações da academia">
                        <span><strong><?php echo str_pad((string) count($landingModalityNames), 2, '0', STR_PAD_LEFT); ?></strong> modalidades</span>
                        <span><strong>01</strong> propósito</span>
                        <span><strong>∞</strong> evolução</span>
                    </div>
                </div>

                <div class="landing-hero__visual" data-reveal style="--reveal-delay: 160ms">
                    <div class="landing-hero__visual-label">Treino real. Evolução constante.</div>
                    <img src="<?php echo e($media['hero']); ?>" alt="Atleta treinando boxe em uma academia de artes marciais" width="1024" height="1536" fetchpriority="high" decoding="async" data-parallax>
                    <div class="landing-hero__visual-mark" aria-hidden="true">GA<span> / 11</span></div>
                </div>
            </div>
            <div class="landing-hero__edge" aria-hidden="true"></div>
        </section>

        <div class="landing-sport-strip" aria-label="Modalidades oferecidas">
            <div class="landing-container landing-sport-strip__inner">
                <?php foreach ($landingModalityNames ?: ['Grade em atualização'] as $index => $landingModalityName): ?>
                    <?php if ($index > 0): ?><i>•</i><?php endif; ?>
                    <span><?php echo e($landingModalityName); ?></span>
                <?php endforeach; ?>
            </div>
        </div>

        <section class="landing-section landing-section--intro" id="academia" aria-labelledby="academia-title">
            <div class="landing-container landing-intro-grid">
                <div class="landing-media-frame landing-media-frame--academy" data-reveal>
                    <div class="landing-media-frame__corner" aria-hidden="true"></div>
                    <img src="<?php echo e($media['academy']); ?>" alt="Interior da academia Garagem Aço com ringue e sacos de pancada" width="1024" height="1536" loading="lazy" decoding="async">
                    <div class="landing-stamp"><span>Desde</span><strong>2011</strong><small>Santa Felicidade<br>Curitiba / PR</small></div>
                </div>

                <div class="landing-copy" data-reveal style="--reveal-delay: 120ms">
                    <p class="landing-section-label">A Garagem</p>
                    <h2 id="academia-title" class="landing-section-title">Um lugar para<br><em>ficar mais forte.</em></h2>
                    <p class="landing-copy__lead">A Garagem Aço nasceu em 2011 com uma proposta direta: ensinar artes marciais com disciplina, respeito, técnica e evolução constante.</p>
                    <p>Você não precisa chegar pronto. Seja a primeira luva, o primeiro kimono ou mais um passo na sua trajetória, existe espaço para começar — e gente para treinar junto.</p>
                    <a class="landing-text-link" href="#contato">Conheça a Garagem <span aria-hidden="true">→</span></a>
                </div>
            </div>
        </section>

        <section class="landing-principles" id="metodo" aria-label="Princípios da Garagem Aço">
            <div class="landing-container landing-principles__inner">
                <p class="landing-section-label">O que nos move</p>
                <div class="landing-principles__words" data-reveal>
                    <span>Disciplina</span><span>Respeito</span><span>Força</span><span>Evolução</span>
                </div>
            </div>
        </section>

        <section class="landing-section landing-section--modalities" id="modalidades" aria-labelledby="modalidades-title">
            <div class="landing-container">
                <div class="landing-heading-row" data-reveal>
                    <div>
                        <p class="landing-section-label">Treine conosco</p>
                        <h2 id="modalidades-title" class="landing-section-title">Escolha seu<br><em>caminho.</em></h2>
                    </div>
                    <p class="landing-heading-row__description">Modalidades para quem está começando, para quem quer se desenvolver e para quem quer competir.</p>
                </div>

                <div class="landing-modality-grid">
                    <?php
                    $modalities = [];
                    if (!empty($landingHasDatabase)) {
                        foreach ($landingModalities as $index => $landingModality) {
                            $modalities[] = [
                                'name' => (string) ($landingModality['nome'] ?? 'Modalidade'),
                                'number' => str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT),
                                'text' => (string) ($landingModality['descricao'] ?? '') ?: 'Treino, técnica e evolução constante.',
                                'alt' => 'Treino de ' . (string) ($landingModality['nome'] ?? 'artes marciais') . ' na Garagem Aço',
                            ];
                        }
                    } else {
                        $modalities = [
                            ['name' => 'Boxe', 'number' => '01', 'text' => 'Velocidade, precisão e condicionamento.', 'alt' => 'Atleta treinando boxe em um saco de pancada'],
                            ['name' => 'Muay Thai', 'number' => '02', 'text' => 'Potência, resistência e presença.', 'alt' => 'Dupla treinando chute e defesa no Muay Thai'],
                            ['name' => 'Jiu-Jitsu', 'number' => '03', 'text' => 'Estratégia, controle e técnica.', 'alt' => 'Dois praticantes treinando uma técnica de Jiu-Jitsu'],
                            ['name' => 'Karatê Shubu-Dô', 'number' => '04', 'text' => 'Disciplina, foco e tradição.', 'alt' => 'Praticante executando um movimento de Karatê'],
                        ];
                    }
                    foreach ($modalities as $index => $modality):
                    ?>
                        <article class="landing-modality-card" data-reveal style="--reveal-delay: <?php echo (int) ($index * 80); ?>ms">
                            <?php $imageIndex = $index % count($media['modalities']); ?>
                            <img src="<?php echo e($media['modalities'][$imageIndex]); ?>" alt="<?php echo e($modality['alt']); ?>" width="1024" height="1536" loading="lazy" decoding="async">
                            <div class="landing-modality-card__shade"></div>
                            <div class="landing-modality-card__number"><?php echo e($modality['number']); ?></div>
                            <div class="landing-modality-card__content">
                                <h3><?php echo e($modality['name']); ?></h3>
                                <p><?php echo e($modality['text']); ?></p>
                                <a href="#contato" aria-label="Quero saber mais sobre <?php echo e($modality['name']); ?>">Saiba mais <span aria-hidden="true">↗</span></a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="landing-section landing-section--benefits" aria-labelledby="benefits-title">
            <div class="landing-container">
                <div class="landing-heading-row" data-reveal>
                    <div>
                        <p class="landing-section-label">Por que treinar aqui?</p>
                        <h2 id="benefits-title" class="landing-section-title">Forjados no<br><em>treino.</em></h2>
                    </div>
                    <p class="landing-heading-row__description">O treino é individual. A evolução é coletiva.</p>
                </div>

                <div class="landing-benefit-grid">
                    <article class="landing-benefit" data-reveal>
                        <span class="landing-benefit__number">01</span>
                        <h3>Treino com propósito</h3>
                        <p>Cada aula tem direção, progressão e atenção para você evoluir com segurança.</p>
                    </article>
                    <article class="landing-benefit" data-reveal style="--reveal-delay: 100ms">
                        <span class="landing-benefit__number">02</span>
                        <h3>Técnica antes da pressa</h3>
                        <p>Aprenda o movimento, entenda o fundamento e construa confiança no seu tempo.</p>
                    </article>
                    <article class="landing-benefit" data-reveal style="--reveal-delay: 200ms">
                        <span class="landing-benefit__number">03</span>
                        <h3>Respeito no tatame</h3>
                        <p>Um ambiente acolhedor para iniciantes, praticantes e atletas continuarem avançando.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="landing-section landing-section--professor" id="professor" aria-labelledby="professor-title">
            <div class="landing-container landing-professor-grid">
                <div class="landing-professor__photo" data-reveal>
                    <img src="<?php echo e($media['professor']); ?>" alt="Professor de artes marciais em frente ao ringue da academia" width="1024" height="1536" loading="lazy" decoding="async">
                    <span class="landing-professor__vertical-label">Professor / Fundador</span>
                </div>
                <div class="landing-copy" data-reveal style="--reveal-delay: 120ms">
                    <p class="landing-section-label">Professor</p>
                    <h2 id="professor-title" class="landing-section-title">Micael<br><em>Santos.</em></h2>
                    <p class="landing-copy__lead">À frente da Garagem Aço, Micael Santos conduz os treinos com uma visão simples: técnica, disciplina, respeito e evolução individual.</p>
                    <p>O objetivo é formar pessoas mais preparadas — dentro e fora da academia — sem perder a tradição e a verdade do treino.</p>
                    <a class="landing-btn" href="#contato">Venha conhecer a Garagem <span aria-hidden="true">↗</span></a>
                </div>
            </div>
        </section>

        <section class="landing-section landing-section--schedule" id="horarios" aria-labelledby="horarios-title">
            <div class="landing-container">
                <div class="landing-heading-row" data-reveal>
                    <div>
                        <p class="landing-section-label">Organize sua rotina</p>
                        <h2 id="horarios-title" class="landing-section-title">Horários de<br><em>treino.</em></h2>
                    </div>
                    <p class="landing-heading-row__description">Escolha o melhor horário para começar a sua jornada. Confirme a grade atual pelo contato da academia.</p>
                </div>

                <div class="landing-schedule-wrap" data-reveal>
                    <table class="landing-schedule">
                        <thead><tr><th>Modalidade</th><th>Dias</th><th>Horário</th><th></th></tr></thead>
                        <tbody>
                            <?php if (empty($landingHasDatabase)): ?>
                                <tr><td data-label="Modalidade">Boxe</td><td data-label="Dias">Seg / Qua / Sex</td><td data-label="Horário">19:00</td><td><a href="#contato" aria-label="Consultar horário de Boxe">Consultar <span aria-hidden="true">↗</span></a></td></tr>
                                <tr><td data-label="Modalidade">Muay Thai</td><td data-label="Dias">Ter / Qui</td><td data-label="Horário">19:00</td><td><a href="#contato" aria-label="Consultar horário de Muay Thai">Consultar <span aria-hidden="true">↗</span></a></td></tr>
                                <tr><td data-label="Modalidade">Jiu-Jitsu</td><td data-label="Dias">Seg / Qua</td><td data-label="Horário">20:00</td><td><a href="#contato" aria-label="Consultar horário de Jiu-Jitsu">Consultar <span aria-hidden="true">↗</span></a></td></tr>
                                <tr><td data-label="Modalidade">Karatê Shubu-Dô</td><td data-label="Dias">Ter / Qui</td><td data-label="Horário">18:00</td><td><a href="#contato" aria-label="Consultar horário de Karatê Shubu-Dô">Consultar <span aria-hidden="true">↗</span></a></td></tr>
                            <?php elseif (empty($landingModalities)): ?>
                                <tr><td colspan="4" class="landing-schedule__empty">A grade de treinos será publicada em breve.</td></tr>
                            <?php else: ?>
                                <?php
                                $landingWeekdays = [1 => 'Seg', 2 => 'Ter', 3 => 'Qua', 4 => 'Qui', 5 => 'Sex', 6 => 'Sáb', 7 => 'Dom'];
                                foreach ($landingModalities as $landingModality):
                                    $dayLabels = [];
                                    $timeLabels = [];
                                    foreach (($landingModality['horarios'] ?? []) as $schedule) {
                                        $day = (int) ($schedule['dia_semana'] ?? 0);
                                        if (isset($landingWeekdays[$day])) {
                                            $dayLabels[$day] = $landingWeekdays[$day];
                                        }
                                        $start = (string) ($schedule['horario_inicio'] ?? '');
                                        $end = (string) ($schedule['horario_fim'] ?? '');
                                        if ($start !== '') {
                                            $timeLabels[] = $start . ($end !== '' ? '–' . $end : '');
                                        }
                                    }
                                    $modalityName = (string) ($landingModality['nome'] ?? 'Modalidade');
                                ?>
                                    <tr>
                                        <td data-label="Modalidade"><?php echo e($modalityName); ?></td>
                                        <td data-label="Dias"><?php echo e($dayLabels ? implode(' / ', $dayLabels) : 'A definir'); ?></td>
                                        <td data-label="Horário"><?php echo e($timeLabels ? implode(' · ', array_unique($timeLabels)) : 'A definir'); ?></td>
                                        <td><a href="#contato" aria-label="Consultar horário de <?php echo e($modalityName); ?>">Consultar <span aria-hidden="true">↗</span></a></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <section class="landing-section landing-section--gallery" id="galeria" aria-labelledby="galeria-title">
            <div class="landing-container landing-gallery-grid">
                <div class="landing-copy" data-reveal>
                    <p class="landing-section-label">Dentro da Garagem</p>
                    <h2 id="galeria-title" class="landing-section-title">Treino de<br><em>verdade.</em></h2>
                    <p class="landing-copy__lead">Suor, repetição, concentração e parceria. É assim que a força aparece: um treino de cada vez.</p>
                    <a class="landing-text-link" href="#contato">Quero treinar <span aria-hidden="true">→</span></a>
                </div>
                <figure class="landing-gallery__image" data-reveal style="--reveal-delay: 120ms">
                    <img src="<?php echo e($media['gallery']); ?>" alt="Alunos e professor treinando juntos na academia Garagem Aço" width="1536" height="1024" loading="lazy" decoding="async">
                    <figcaption>Treino de verdade na Garagem Aço <span>Imagem editorial da rotina de treinos</span></figcaption>
                </figure>
            </div>
        </section>

        <section class="landing-testimonials" aria-labelledby="testimonials-title">
            <div class="landing-container">
                <p class="landing-section-label">Quem treina, sente</p>
                <h2 id="testimonials-title" class="landing-section-title">A evolução<br><em>é pessoal.</em></h2>
                <div class="landing-testimonials__grid">
                    <blockquote data-reveal><p>“Você chega para aprender uma luta e acaba encontrando uma rotina que muda o resto do dia.”</p><cite>— Aluno da Garagem</cite></blockquote>
                    <blockquote data-reveal style="--reveal-delay: 120ms"><p>“O ambiente acolhe quem está começando e desafia quem quer ir além. Isso faz diferença.”</p><cite>— Aluna da Garagem</cite></blockquote>
                </div>
            </div>
        </section>

        <section class="landing-cta" id="contato" aria-labelledby="cta-title">
            <div class="landing-cta__background-word" aria-hidden="true">FORÇA</div>
            <div class="landing-container landing-cta__content" data-reveal>
                <p class="landing-section-label">Sua evolução começa aqui</p>
                <h2 id="cta-title">Se for para desistir,<br><em>desista de ser fraco.</em></h2>
                <p>Agende uma aula experimental e conheça a Garagem Aço em Santa Felicidade.</p>
                <a class="landing-btn" href="#contato-info">Agendar aula experimental <span aria-hidden="true">↗</span></a>
            </div>
        </section>

        <section class="landing-contact" id="contato-info" aria-labelledby="contact-title">
            <div class="landing-container landing-contact__grid">
                <div data-reveal>
                    <p class="landing-section-label">Encontre a gente</p>
                    <h2 id="contact-title" class="landing-section-title">Pronto para<br><em>começar?</em></h2>
                </div>
                <div class="landing-contact__details" data-reveal style="--reveal-delay: 120ms">
                    <div><span>Local</span><strong>Santa Felicidade<br>Curitiba / PR</strong></div>
                    <div><span>Contato</span><strong>WhatsApp comercial<br>Link a configurar</strong></div>
                    <div><span>Mapa</span><a href="https://www.google.com/maps/search/?api=1&amp;query=Santa+Felicidade%2C+Curitiba%2C+PR" target="_blank" rel="noopener noreferrer">Ver região no mapa <span aria-hidden="true">↗</span></a></div>
                </div>
            </div>
        </section>
    </main>

    <footer class="landing-footer">
        <div class="landing-container">
            <div class="landing-footer__grid">
                <div>
                    <a class="landing-brand landing-brand--footer" href="#inicio" aria-label="Garagem Aço — início">
                        <img src="<?php echo e(asset('/assets/logo-garagem-aco.png')); ?>" alt="" width="58" height="52" loading="lazy" decoding="async">
                        <span class="landing-brand__wordmark">GARAGEM <b>AÇO</b></span>
                    </a>
                    <p>Boxe • Muay Thai • Jiu-Jitsu • Karatê Shubu-Dô</p>
                </div>
                <div><span class="landing-footer__label">Navegação</span><a href="#academia">A Garagem</a><a href="#modalidades">Modalidades</a><a href="#horarios">Horários</a><a href="#galeria">Galeria</a></div>
                <div><span class="landing-footer__label">Local</span><p>Santa Felicidade<br>Curitiba / PR</p><a href="#contato-info">Fale com a academia</a></div>
            </div>
            <div class="landing-footer__bottom"><span>© Garagem Aço — Desde 2011</span><span>Se for para desistir, desistir de ser fraco.</span><a href="<?php echo e(url('/login')); ?>">Entrar: aluno ou equipe</a></div>
        </div>
    </footer>

    <a class="landing-whatsapp" href="<?php echo e($whatsappUrl); ?>" aria-label="Falar pelo WhatsApp" title="WhatsApp — configure o link de atendimento">
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20.5 3.5A11.85 11.85 0 0 0 12.07 0C5.52 0 .2 5.32.2 11.87c0 2.09.55 4.13 1.58 5.92L.1 24l6.36-1.67a11.9 11.9 0 0 0 5.61 1.43h.01c6.54 0 11.87-5.32 11.87-11.87 0-3.17-1.23-6.14-3.45-8.39ZM12.08 21.7h-.01a9.82 9.82 0 0 1-5.01-1.37l-.36-.22-3.77.99 1-3.67-.24-.38a9.85 9.85 0 1 1 8.39 4.65Zm5.4-7.39c-.3-.15-1.77-.87-2.05-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.17-.17.2-.35.22-.65.07-.3-.15-1.27-.47-2.42-1.5-.89-.79-1.5-1.77-1.67-2.07-.17-.3-.02-.46.13-.61.14-.14.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.07-.15-.67-1.62-.92-2.22-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.8.37-.27.3-1.05 1.02-1.05 2.49s1.07 2.89 1.22 3.09c.15.2 2.1 3.21 5.09 4.5.71.31 1.27.49 1.71.63.72.23 1.38.2 1.9.12.58-.09 1.77-.72 2.02-1.42.25-.69.25-1.29.17-1.42-.07-.12-.27-.2-.57-.35Z"/></svg>
    </a>
    <script>
        (() => {
            const page = document.querySelector('.landing-page');
            if (!page) return;

            page.classList.add('js-ready');

            const header = document.querySelector('.landing-header');
            const revealItems = [...document.querySelectorAll('[data-reveal]')];
            const menu = document.querySelector('.landing-mobile-menu');
            const parallaxImage = document.querySelector('[data-parallax]');
            const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

            if (reducedMotion || !('IntersectionObserver' in window)) {
                revealItems.forEach((element) => element.classList.add('is-visible'));
            } else {
                const revealObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach((entry) => {
                        if (!entry.isIntersecting) return;

                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    });
                }, { threshold: 0.14, rootMargin: '0px 0px -8% 0px' });

                revealItems.forEach((element) => revealObserver.observe(element));
            }

            let scrollFrame = null;
            const syncScrollState = () => {
                if (header) header.classList.toggle('is-scrolled', window.scrollY > 30);

                if (reducedMotion || !parallaxImage || scrollFrame !== null) return;

                scrollFrame = window.requestAnimationFrame(() => {
                    const offset = Math.min(window.scrollY, 520) * 0.06;
                    parallaxImage.style.setProperty('--parallax-y', `${offset}px`);
                    scrollFrame = null;
                });
            };

            window.addEventListener('scroll', syncScrollState, { passive: true });
            syncScrollState();

            if (menu) {
                menu.querySelectorAll('a').forEach((link) => {
                    link.addEventListener('click', () => { menu.open = false; });
                });
            }
        })();
    </script>
</body>
</html>

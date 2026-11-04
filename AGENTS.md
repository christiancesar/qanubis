# AGENTS.md

Orientações para quem contribui com este fork do [QAnubis](https://github.com/gilischmidt/qanubis), inclusive agentes de IA. O fork existe para apoiar a análise qualitativa do mestrado (projeto Oikos) e evoluir a ferramenta a partir do uso real. A referência conceitual é o artigo da ferramenta: *QAnubis: Uma Ferramenta Web de Apoio ao Processo de Análise Qualitativa* (SBES 2025).

## Regra principal: toda mudança tem justificativa

Nenhuma alteração entra sem uma issue que explique o problema observado e a proposta.

1. **Issue primeiro.** Descreva o contexto (o que foi observado, onde no código, como reproduzir) e a proposta. Quando a mudança afetar o processo de análise, relacione com o que o artigo da ferramenta ou o método de codificação (Saldaña) prevê.
2. **Branch a partir da issue:** `<nº>-<slug>` criada sobre `main` (ex.: `5-heatmap-legivel`).
3. **Plano quando houver decisão de design:** `plans/<nº>-<slug>/00-plano.md`, e `tickets/` se o trabalho tiver mais de um passo (ver `plans/README.md`).
4. **Pull request para `main`.** Nunca commitar direto em `main`.
5. **Corpo do PR:** apenas `## Contexto` e `## O que foi feito`, com `Closes #<nº>`. Trabalho incompleto vira nova issue, não lista de pendências no PR.

Mudanças que valem para o projeto original devem ficar pequenas e isoladas, para poderem ser propostas ao `upstream` depois.

## Remotes

- `origin`: este fork (`christiancesar/qanubis`).
- `upstream`: projeto original (`gilischmidt/qanubis`). Não abrir PR no upstream sem pedido explícito.

## Stack

- Laravel 8, PHP 8.0 (o `composer.lock` exige PHP 8.0.2 ou superior, apesar de o README citar 7.4).
- MySQL/MariaDB.
- Front-end em JavaScript com jQuery, Bootstrap, pdf.js, amCharts 4 e Summernote, compilado com Laravel Mix (`webpack.mix.js`). Os arquivos compilados em `public/js` e `public/css` são versionados: após alterar `resources/js` ou `resources/sass`, rode `npm run prod` e commite o resultado.
- Código-fonte do front-end em `resources/js/pages/projects/` (`codes`, `documents`, `quotes`, `memos`, `results`).

## Domínio

- **Projeto** (`projects`): agrupa documentos, códigos, citações e memos de um usuário.
- **Documento** (`documents`): arquivo PDF analisado.
- **Código** (`codes`): rótulo de significado. `parent_code_id` forma a árvore; `is_category` marca grupos. Categoria não recebe citação direta.
- **Citação** (`quotes`): trecho codificado. `data.text` guarda o texto; `extra_data.coords` guarda retângulos em coordenadas PDF (`[x1, y1, x2, y2]`) por página, com `page` como string do índice (base 0).
- **Memo** (`memos`): anotação analítica em HTML (editor Summernote).

## Convenções

- Código, identificadores e mensagens da interface seguem o padrão existente (inglês). Issues, planos e documentação do fork em português.
- Sem comentários no código por padrão. Decisões de design vão para o plano da issue.
- Sem `TODO`/`FIXME` no código: pendência vira issue.
- Commits pequenos e descritivos, em português, no imperativo ou descritivo curto.
- Não usar travessão (—) nem ponto médio (·) em textos; usar vírgula, dois-pontos ou hífen.

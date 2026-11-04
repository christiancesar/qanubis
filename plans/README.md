# plans

Planos e decisões de design ligados às issues do fork.

## Estrutura

```
plans/
  <nº-da-issue>-<slug>/
    00-plano.md          contexto, decisões e escopo
    tickets/
      T01-<slug>.md      um passo executável, quando o trabalho tiver mais de um
```

O diretório usa o mesmo número e slug da branch da issue.

## 00-plano.md

- **Issue:** link para a issue.
- **Contexto:** o problema, com referência a arquivo e linha.
- **Decisões:** o que foi escolhido, as alternativas consideradas e o motivo.
- **Escopo:** o que entra e o que fica de fora (o que fica de fora vira issue).
- **Tickets:** lista dos passos, quando houver.

## Ticket

- **Status:** `[ ]` pendente ou `[x]` concluído.
- **Depende de:** outro ticket, se houver.
- **Arquivos:** caminhos afetados.
- **Checklist:** passos e verificação.
- **Contexto:** o necessário para executar o passo sem reler o plano inteiro.

Uma decisão registrada no plano não é repetida em comentário no código.

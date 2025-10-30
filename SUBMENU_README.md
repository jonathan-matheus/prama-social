# Sistema de Submenus - Pragma Social Theme

## Funcionalidades Implementadas

### 1. Submenus com Hover

Os submenus agora funcionam corretamente ao passar o mouse sobre itens de menu que têm sub-itens.

### 2. Indicadores Visuais

- Setas que indicam a presença de submenus
- Animações suaves de transição
- Rotação das setas ao abrir/fechar submenus

### 3. Responsividade

- Em desktop: submenus aparecem no hover
- Em mobile: submenus são expandidos/contraídos ao clicar

### 4. Acessibilidade

- Navegação por teclado completa
- Atributos ARIA apropriados
- Suporte a leitores de tela

### 5. Suporte a Múltiplos Níveis

- Suporte até 3 níveis de profundidade
- Submenus de terceiro nível aparecem lateralmente

## Como Usar

### 1. No Painel do WordPress

1. Vá para **Aparência > Menus**
2. Crie ou edite um menu existente
3. Arraste itens de menu para dentro de outros para criar submenus
4. Atribua o menu a uma das localizações:
   - **Header Menu**: Menu superior
   - **Primary Menu**: Menu principal

### 2. Estrutura de Exemplo

```
Home
Sobre
├── Nossa História
├── Equipe
└── Missão
Serviços
├── Consultoria
│   ├── Estratégica
│   └── Operacional
├── Treinamentos
└── Suporte
Contato
```

### 3. Navegação por Teclado

- **Tab**: Navegar entre itens
- **Enter/Seta para baixo**: Abrir submenu
- **Escape**: Fechar submenu
- **Setas**: Navegar dentro do submenu

## Arquivos Criados/Modificados

### Novos Arquivos

- `/assets/css/menu.css` - Estilos para submenus
- `/assets/js/menu.js` - JavaScript para funcionalidade
- `/src/output.css` - CSS de fallback

### Arquivos Modificados

- `/functions.php` - Adicionado carregamento dos novos assets
- `/header.php` - Adicionadas classes CSS necessárias
- `/includes/class-menu-manager.php` - Melhorias nas classes de menu

## Personalização

### Cores

As cores dos submenus seguem as configurações do tema:

- Cor de fundo: Branco
- Cor do texto: Cinza escuro
- Hover: Cinza claro

### Animações

- Transição suave de 0.3s
- Transformação de escala e opacidade
- Rotação das setas indicativas

### Responsividade

- Desktop: Submenus flutuantes
- Tablet/Mobile: Submenus em lista expandível

## Compatibilidade

- WordPress 6.0+
- PHP 8.2+
- Todos os navegadores modernos
- Compatível com Tailwind CSS
- Funciona com ou sem JavaScript habilitado

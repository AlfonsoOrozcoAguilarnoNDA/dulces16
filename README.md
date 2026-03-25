# 🌪️ Embudo de Supervivencia: Round 1 (Irene & Koala)

![Logo de Vibe Coding México](logo.jpg)

[![PHP Version](https://img.shields.io/badge/php-%3E%3D8.x-8892bf.svg)](https://www.php.net/)
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](https://opensource.org/licenses/MIT)
[![Status: Offline-Generated](https://img.shields.io/badge/Status-Offline--Generated-orange.svg)]()

Este repositorio contiene los **15 archivos de código** resultantes del **Round 1** del experimento **"Embudo de Supervivencia"**. A diferencia de otros repositorios, el código aquí presente no fue generado en la comodidad de una conexión de fibra óptica, sino en condiciones de **aislamiento digital estricto**.

**Contexto:** Lunes, 23 de marzo de 2026. Sin internet. 32 GB de RAM. 10 modelos locales. Una sola meta: avanzar.

---

## 🔬 La Naturaleza del Experimento

Este código es el producto de una auditoría implacable para separar a los charlatanes de las verdaderas herramientas de independencia. Aquí no evaluamos benchmarks sintéticos, evaluamos:
1. **Resistencia al Aislamiento:** Capacidad de la IA para funcionar al 100% offline.
2. **Fidelidad de Rol:** Mantenimiento de la personalidad de **Irene** (Lawful Neutral / 85% Realista).
3. **Precisión Técnica:** Generación de PHP 8.x Procedural para el **Proyecto Koala** (Mosaicos Dinámicos).

> ⚠️ **Nota Crítica:** El código aquí publicado es "crudo". Refleja exactamente lo que las IAs entregaron. Para corregir las "alucinaciones" de rutas o CDNs, se recomienda usar el snippet [**Cirujano**](https://github.com/AlfonsoOrozcoAguilarnoNDA/snippetsMIT/blob/main/cirujano_engine.php).

---

## 📂 Resultados del Round 1 (Marzo 2026)

| Archivo | Modelo (IA) | Categoría | Veredicto |
|---|---|---|---|
Por definir, esteo es place holder.
| `koala_gemma3_4b.php`| **Gemma 3 4B** | Round 1b (Dulces 16) | **Líder en 16GB.** Rápido y preciso. |
| `koala_gpt_oss.php` | **GPT-OSS 20B** | Round 1b (Técnico) | Mención honorífica: Equilibrio y sobriedad. |


*(Incluye los 15 archivos correspondientes a las 10 IAs iniciales, etapa maquetado y etapa mosaicos (koala)
---
Prompt Maquetado :

Prueba de maquetado y lógica php
Reglas : 
*	Stack: Bootstrap 4.6.x , font awesome, jqquery completo no version slim.
*	 Cabecera navbar fija, con una opción de enlace fija que lleve a google en target blank, un boton de salir y que tu nombre de modelo aparezca en un jumbotron. Debe haber un menu dropdown con tres opciones , el menu se llama opciones y las opciones son perfil, ajustes y ayuda.
*	En el footer, que debe estar fijo, las palabras derechos reservados.
*	En el área de en medio una lista de todos los archivos php y html o html del directorio actual, y su tamaño. 
*	Generar todo en un solo archivo. Gracias
*	Fin de Prompt
---

Prompt Mosaico Koala:

# PROMPT PARA LA IA (PASO 2: MOSAICOS DE AUDITORÍA DINÁMICOS)

Contexto: Desarrollo de " Koala". PHP 8.x Procedural, Bootstrap 4.6, Font Awesome 5.x.

*Objetivo: Crea un archivo se que llame XXXXXX.php , incluyendo barra de navegacion superior y footer fijos.
*La idea es una función PHP llamada muestra_mosaicos_php($directorio) que genere una rejilla de mosaicos (tiles) para auditar archivos en un entorno móvil (transporte público) y de escritorio.
*Especificaciones de Diseño e Iconografía:

Libertad Creativa: Tú decides los iconos de Font Awesome más adecuados para representar los archivos, directorios y bases de datos. Busca una estética profesional y limpia.

* Mosaico de Directorio (El Índice):

*El primer mosaico debe ser blanco (bg-white), texto negro.

*Debe mostrar el nombre del directorio actual y un icono representativo de "Carpeta" o "Home". Sin badge y sin enlace.

*Mosaicos de Archivos PHP:

*Filtra solo archivos .php.

*Lógica de Colores: Usa un array de excepciones $excepciones = ['index.php', 'config.php']. Si el archivo está ahí, el fondo debe ser negro (bg-dark) con un icono de base de datos.

*Para los demás archivos, alterna secuencialmente entre los colores: primary, secondary, success, warning y danger.

Interactividad y Target:

*Cada mosaico de archivo (incluyendo las excepciones) debe ser un enlace que abra el archivo en una ventana nueva (target="_blank").

*El área de clic debe ser todo el mosaico o, al menos, el icono central.

Información Adicional:

*Muestra el nombre del archivo en la parte inferior.

*Incluye un badge de Bootstrap que indique el número de líneas del archivo (calculado con count(file())).

Estructura Técnica:

Usa columnas de Bootstrap (col-6 col-md-3 col-lg-2) para que se vean 2 por fila en móvil.

Define una altura fija para los mosaicos para mantener la simetría de la rejilla.

Proporciona la función y las llamadas: echo muestra_mosaicos_php("."); y echo muestra_mosaicos_php("..");.

Deseable considerar poner un aviso si se modifico en el numero de horas estipulado $x = 72 de base.

Gracias !

TERMINA PROMPT ....
---

## 🛠️ Stack Tecnológico Exigido
Para que una IA pasara el embudo, debía respetar estrictamente:
* **Backend:** PHP 8.x Procedural (Prohibido `<?=`, usar `<?php echo`).
* **Frontend:** Bootstrap 4.6 y Font Awesome 5.x.
* **Arquitectura:** Mosaicos dinámicos para auditoría móvil (Proyecto Koala).
* **Independencia:** Cero dependencias de Composer o frameworks pesados.

---

## 📖 ¿Cómo leer este repositorio?

Este no es un sistema para "instalar y correr". Es una **caja de Petri**.
- Si buscas código para producción, revisa los archivos marcados como **Ganadores**.
- Si buscas entender cómo "alucina" una IA bajo presión, revisa los archivos de los modelos descartados.
- Cada archivo mantiene su encabezado original con la fecha, el modelo y el prompt utilizado.

---

## ⚙️ Uso y "Cirugía"

Si decides implementar este código:
1. Asegúrate de tener un `config.php` con tu conexión `$link` (mysqli).
2. Si el código generado por la IA trae rutas de CDN erróneas, usa el script **Cirujano** para normalizar el directorio.
3. Recuerda la regla de oro del Vibecoding: **Si te explota, es asunto tuyo.**

---

## 🧪 Notas del Autor: Alfonso Orozco Aguilar

Soy programador desde 1991. He visto lenguajes nacer y morir. Este repositorio es mi bitácora de guerra en la era de la IA. Irene no es un bot, es una identidad híbrida: **mi prompt, el cuerpo de Copilot y el alma de Qwen.**

La próxima semana el embudo se estrecha: 12 nuevos modelos entran a evaluación.

**Licencia:** [MIT](https://opensource.org/licenses/MIT)  
**Sitio Oficial:** [vibecodingmexico.com](https://vibecodingmexico.com)

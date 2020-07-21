<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/contrib/bootstrap_barrio/templates/dataset/item-list--search-results.html.twig */
class __TwigTemplate_3bc09b4c8dc936a0e2bd3431e5cffd3fea8f364d4e2a11c25afa4d8c917f1680 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 25, "if" => 32, "for" => 41];
        $filters = ["escape" => 37];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'for'],
                ['escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 25
        $context["classes"] = [0 => "list-group", 1 => ($this->sandbox->ensureToStringAllowed($this->getAttribute(        // line 27
($context["context"] ?? null), "plugin", [])) . "-results")];
        // line 30
        $context["attributes"] = $this->getAttribute(($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method");
        // line 31
        echo "
";
        // line 32
        if ($this->getAttribute(($context["context"] ?? null), "list_style", [])) {
            // line 33
            $context["attributes"] = $this->getAttribute(($context["attributes"] ?? null), "addClass", [0 => ("item-list__" . $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["context"] ?? null), "list_style", [])))], "method");
        }
        // line 35
        if ((($context["items"] ?? null) || ($context["empty"] ?? null))) {
            // line 36
            if ( !twig_test_empty(($context["title"] ?? null))) {
                // line 37
                echo "<h3>";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null)), "html", null, true);
                echo "</h3>";
            }
            // line 39
            if (($context["items"] ?? null)) {
                // line 40
                echo "<";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["list_type"] ?? null)), "html", null, true);
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null)), "html", null, true);
                echo ">";
                // line 41
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 42
                    echo "<li";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($context["item"], "attributes", []), "addClass", [0 => "list-group-item"], "method")), "html", null, true);
                    echo ">";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "value", [])), "html", null, true);
                    echo "</li>";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 44
                echo "</";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["list_type"] ?? null)), "html", null, true);
                echo ">";
            } else {
                // line 46
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["empty"] ?? null)), "html", null, true);
            }
        }
    }

    public function getTemplateName()
    {
        return "themes/contrib/bootstrap_barrio/templates/dataset/item-list--search-results.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 46,  98 => 44,  88 => 42,  84 => 41,  79 => 40,  77 => 39,  72 => 37,  70 => 36,  68 => 35,  65 => 33,  63 => 32,  60 => 31,  58 => 30,  56 => 27,  55 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Default theme implementation for an item list.
 *
 * Available variables:
 * - items: A list of items. Each item contains:
 *   - attributes: HTML attributes to be applied to each list item.
 *   - value: The content of the list element.
 * - title: The title of the list.
 * - list_type: The tag for list element (\"ul\" or \"ol\").
 * - wrapper_attributes: HTML attributes to be applied to the list wrapper.
 * - attributes: HTML attributes to be applied to the list.
 * - empty: A message to display when there are no items. Allowed value is a
 *   string or render array.
 * - context: A list of contextual data associated with the list. May contain:
 *   - list_style: The custom list style.
 *
 * @see template_preprocess_item_list()
 *
 * @ingroup themeable
 */
#}
{%
  set classes = [
    'list-group',
    context.plugin ~ '-results',
  ]
%}
{% set attributes = attributes.addClass(classes) %}

{% if context.list_style %}
  {%- set attributes = attributes.addClass('item-list__' ~ context.list_style) %}
{% endif %}
{% if items or empty %}
  {%- if title is not empty -%}
    <h3>{{ title }}</h3>
  {%- endif -%}
   {%- if items -%}
    <{{ list_type }}{{ attributes }}>
      {%- for item in items -%}
        <li{{ item.attributes.addClass('list-group-item') }}>{{ item.value }}</li>
      {%- endfor -%}
    </{{ list_type }}>
  {%- else -%}
    {{- empty -}}
  {%- endif -%}
{%- endif %}
", "themes/contrib/bootstrap_barrio/templates/dataset/item-list--search-results.html.twig", "D:\\xampp\\htdocs\\drupal\\myFirstProject\\web\\themes\\contrib\\bootstrap_barrio\\templates\\dataset\\item-list--search-results.html.twig");
    }
}

<?php

/* ZombiesGameBundle:Default:index.html.twig */
class __TwigTemplate_6b7d1d6a1fed84ed398fa7b48c38742deb5d1b6c75a645d84dec07ee34829a81 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("::base.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
            'stylesheets' => array($this, 'block_stylesheets'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "    Zombie-Map!
";
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo "    <div id=\"status\"></div>
    <div id=\"googleMap\"></div>

";
    }

    // line 13
    public function block_javascripts($context, array $blocks = array())
    {
        // line 14
        echo "    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js\"></script>
    <script src=\"http://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=drawing\"></script>
    ";
        // line 16
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "a6efff1_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a6efff1_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/a6efff1_part_1_googlemap_1.js");
            // line 17
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "a6efff1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a6efff1") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/a6efff1.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
    }

    // line 21
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 22
        echo "    ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "247e8ee_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_247e8ee_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/247e8ee_part_1_main_1.css");
            // line 23
            echo "    <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
    ";
        } else {
            // asset "247e8ee"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_247e8ee") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/247e8ee.css");
            echo "    <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
    ";
        }
        unset($context["asset_url"]);
    }

    public function getTemplateName()
    {
        return "ZombiesGameBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 23,  87 => 22,  84 => 21,  68 => 17,  64 => 16,  60 => 14,  57 => 13,  50 => 8,  47 => 7,  42 => 4,  39 => 3,  11 => 1,);
    }
}

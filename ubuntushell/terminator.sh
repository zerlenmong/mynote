#!/bin/bash
#
# Shell script that configures terminator to use solarized theme
# colors. Assumes a single terminator profile. Tested on Ubuntu 11.10.
#
# Solarized theme: http://ethanschoonover.com/solarized
#
# Original from 79CetiB:
# http://www.reddit.com/r/emacs/comments/npfmv/i_need_some_help_with_the_solarized_theme_in_a/c3b4mds
#
# Adapted from these sources:
# https://gist.github.com/1397104
# http://xorcode.com/guides/solarized-vim-eclipse-ubuntu/
# http://codefork.com/blog/index.php/2011/11/27/getting-the-solarized-theme-to-work-in-emacs/
# http://www.sharms.org/blog/2010/08/terminator-color-palettes/

PALETTE=
BG_COLOR=
FG_COLOR=

case "${1}" in
  "dark")
    PALETTE='palette = "#070736364242:#D3D301010202:#858599990000:#B5B589890000:#26268B8BD2D2:#D3D336368282:#2A2AA1A19898:#EEEEE8E8D5D5:#00002B2B3636:#CBCB4B4B1616:#58586E6E7575:#65657B7B8383:#838394949696:#6C6C7171C4C4:#9393A1A1A1A1:#FDFDF6F6E3E3"'
    BG_COLOR='background\_color = "#00002B2B3636"'
    FG_COLOR='foreground\_color = "#65657B7B8383"'
    ;;
  "light")
    PALETTE='palette = "#EEEEE8E8D5D5:#D3D301010202:#858599990000:#B5B589890000:#26268B8BD2D2:#D3D336368282:#2A2AA1A19898:#070736364242:#FDFDF6F6E3E3:#CBCB4B4B1616:#9393A1A1A1A1:#838394949696:#65657B7B8383:#6C6C7171C4C4:#58586E6E7575:#00002B2B3636"'
    BG_COLOR='background\_color = "#FDFDF6F6E3E3"'
    FG_COLOR='foreground\_color = "#838394949696"'
    ;;
  *)
    echo "Usage: solarized_terminator [light | dark]"
    exit 1
    ;;
  esac

sed -i "s_palette.*_${PALETTE}_;s_background\_color.*_${BG_COLOR}_;s_foreground\_color.*_${FG_COLOR}_" ~/.config/terminator/config

# CADViewer script library demos (Apache + PHP handlers + AutoXchange) for Coolify or any Docker host.
# The library is served under /cadviewer/, the layout expected by php/CADViewer_config.php
# and by the html/*_12.html samples. Converters are x86_64: build for linux/amd64.

FROM php:8.3-apache-bookworm

RUN apt-get update \
    && apt-get install -y --no-install-recommends xz-utils libfontconfig1 libfreetype6 libexpat1 libpng16-16 \
    && rm -rf /var/lib/apt/lists/* \
    && a2enmod rewrite headers

COPY docker/apache.conf /etc/apache2/sites-available/000-default.conf
COPY docker/php.ini /usr/local/etc/php/conf.d/cadviewer.ini

WORKDIR /var/www/html/cadviewer
COPY . .

# php/ is the cadviewer-php-scripts submodule: fail early if the checkout skipped it
RUN test -f php/call-Api_Conversion.php \
        || { echo "php/ is empty: clone with submodules (git submodule update --init)" >&2; exit 1; } \
    && cd converters/autoxchange/linux \
    && tar -xJf ax2026_L64_27_06b_163d.tar.xz --strip-components=1 --skip-old-files \
    && rm ax2026_L64_27_06b_163d.tar.xz \
    && chmod +x ax2026_L64_27_06b_163d AxCopy_L64_01_00_02 \
    && cd ../../dwgmerge/linux && gunzip DwgMerge_2023_L64_23_12_03.gz && chmod +x DwgMerge_2023_L64_23_12_03 \
    && cd ../../linklist/linux && gunzip LinkList_2025_L64_25_07_14.gz && chmod +x LinkList_2025_L64_25_07_14 \
    && sh /var/www/html/cadviewer/docker/build-index.sh > /var/www/html/index.html \
    && mkdir -p /var/www/html/cadviewer/php/logs /var/www/html/cadviewer/converters/files /var/www/html/cadviewer/content/redlines \
    && chown -R www-data:www-data /var/www/html/cadviewer/converters/files /var/www/html/cadviewer/content/redlines /var/www/html/cadviewer/php/logs

EXPOSE 80
HEALTHCHECK --interval=30s --timeout=5s --start-period=20s --retries=3 \
    CMD curl -fsS -o /dev/null http://localhost/ || exit 1
